<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectImage;
use App\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:super_admin|editor')->only(['index', 'getProjectData', 'uplodedImages']);
        $this->middleware('role:super_admin|editor')->only(['create', 'store']);
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only(['destroy', 'deleteImage']);


        $this->validationRules["service_id.*"] = 'required|exists:services,id';
        $this->validationRules["image"] = 'required|image';
        $this->validationRules["project_cost"] = 'required';
        $this->validationRules["project_bulid_date"] = 'required|date_format:Y';
        $this->validationRules["image"] = 'required|image';

        $this->validationRules["ar.project_name"] = 'required';
        $this->validationRules["en.project_name"] = 'required';
        $this->validationRules["ar.location"] = 'required';
        $this->validationRules["en.location"] = 'required';
        $this->validationRules["ar.project_type"] = 'required';
        $this->validationRules["en.project_type"] = 'required';
        $this->validationRules["ar.client_name"] = 'required';
        $this->validationRules["en.client_name"] = 'required';
        $this->validationRules["ar.description"] = 'required';
        $this->validationRules["en.description"] = 'required';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.project.index');
    }


    public function getProjectData(Request $request)
    {

        $data = Project::get();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })

            ->addColumn('image', function ($row) {
                $btn = "<img width='50' class='img-thumbnail' height='50' src='" . $row->image . "'>";
                return $btn;
            })

            ->addColumn('service_name', function ($row) {
                $btn = "<span class='badge badge-primary'>" . $row->service_name . "</span>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';
                $btn .= "<a href=" . route('project.edit', $row->id) . "
                            class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                            <i class='fal fa-edit'></i>
                        </a> ";
                $btn .= "<a href=" . route('project.uplodeImage', $row->id) . "
                        class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                        <i class='fal fa-images'></i>
                    </a> ";

                if (auth()->user()->hasRole('super_admin')) {
                    $btn .= "<button type='button' name='delete'
                            id='$row->id'  class='delete  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                            <i class='fal fa-trash-alt'>
                        </button>";
                } else {
                    $btn .= "<button type='button'
                                class='disabled  btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                                <i class='fal fa-trash-alt'>
                            </button>";
                }

                return $btn;
            })

            ->rawColumns(['action', 'status_value', 'image', 'service_name', 'timeDate'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $services = Service::all();
        return view('Manager.dashboard.project.add')
            ->with('services', $services)
            ->with('validator', $validator);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->validationRules);
        $data = $request->all();



        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $data['image'] = $this->uploadImage($request->image, 'project_images');

            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/project_images/"  . $filename   .  ".webp"));
            // $data['image'] = "uploads/project_images/"  . $filename   . ".webp";
        }

        $data['status'] = $request->get('status', 0);
        $data['view_status'] = $request->get('view_status', 0);


        $data['en']['project_slug'] = str_replace(' ', '-', $data['en']['project_name']);
        $data['ar']['project_slug'] = str_replace(' ', '-', $data['ar']['project_name']);

        $project = Project::create($data);
        $services_id = $request->get('services_id', []);
        $project->services()->sync($services_id);
        Toastr::success(t('Add Success'));

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $services = Service::all();

        return view("Manager.dashboard.project.edit")
            ->with('services', $services)
            ->with('project', $project)
            ->with('validator', $validator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $project = Project::find($id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $request->validate($this->validationRules);



        $data = $request->all();

        $data['status'] = $request->get('status', 0);
        $data['view_status'] = $request->get('view_status', 0);

        $data['en']['project_slug'] = str_replace(' ', '-', $data['en']['project_name']);
        $data['ar']['project_slug'] = str_replace(' ', '-', $data['ar']['project_name']);


        if ($request->hasFile('image')) {
            $this->delete_previous_image($project->image);

            $data['image'] = $this->uploadImage($request->image, 'project_images');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/project_images/"  . $filename   .  ".webp"));
            // $data['image'] = "uploads/project_images/"  . $filename   . ".webp";
        }

        $project->update($data);
        $services_id = $request->get('services_id', []);
        $project->services()->sync($services_id);

        Toastr::success(t('Edit Success'));
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }

        $this->delete_previous_image($project->image);

        $project->delete();
        Toastr::success(t('Add Success'));
        return redirect()->route('project.index');
    }



    public function uplodeImage($id)
    {
        $project = Project::find($id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);

        $images = ProjectImage::where('project_id', $project->id)->get();
        return view("Manager.dashboard.project.images")
            ->with('images', $images)
            ->with('validator', $validator)
            ->with('project', $project);
    }


    public function storeImages(Request $request, $id)
    {
        $project = Project::find($id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }
        $data = $request->all();


        if ($request->hasFile('file')) {
            $data['image'] = $this->uploadImage($request->file, 'project_images');

            // $image = $request->file('file');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/project_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/project_images/"  . $filename   . ".webp";
        }

        $data['project_id'] = $project->id;

        ProjectImage::create($data);

        Toastr::success(t('Add Success'));
        return response()->json(["status" => "success", "data" => $data]);
    }


    public function deleteImage(Request $request, $id, $project_id)
    {
        $project = Project::find($project_id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }
        $project_image  = ProjectImage::where('project_id', $project->id)->where('id', $id)->first();
        if (!$project_image) {
            Toastr::error(t('Not Found'));
            return redirect()->back();
        }

        $this->delete_previous_image($project_image->image);

        $project_image->delete();

        Toastr::success(t('Delete Success'));
        return redirect()->back();
    }


    public function uplodedImages(Request $request, $id)
    {
        $project = Project::find($id);
        if (!$project) {
            Toastr::error(t('Not Found'));
            return redirect()->route('project.index');
        }
        $data = ProjectImage::where('project_id', $project->id)->get();
        return response()->json(["status" => "success", "data" => $data]);
    }
}
