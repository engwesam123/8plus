<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use App\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:super_admin|editor')->only(['index', 'getServiceData']);
        $this->middleware('role:super_admin|editor')->only(['create', 'store']);
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only('destroy');

        $this->validationRules["ar.name"] = 'required';
        $this->validationRules["en.name"] = 'required';
        $this->validationRules["ar.description"] = 'required';
        $this->validationRules["en.description"] = 'required';
        $this->validationRules["image"] = 'required|image';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.service.index');
    }


    public function getServiceData(Request $request)
    {

        $data = Service::get();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })

            ->addColumn('project_count', function ($row) {
                $btn = "<span class='badge badge-primary'>" . $row->projects->count() . "</span>";
                return $btn;
            })
            ->addColumn('image', function ($row) {
                $btn = "<img width='50' class='img-thumbnail' height='50' src='" . $row->image . "'>";
                return $btn;
            })


            ->addColumn('action', function ($row) {

                $btn = '';
                $btn .= "<a href=" . route('service.edit', $row->id) . "
                            class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                            <i class='fal fa-edit'></i>
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

            ->rawColumns(['action', 'project_count', 'image', 'timeDate'])
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
        return view('Manager.dashboard.service.add')->with('validator', $validator);
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

            $data['image'] = $this->uploadImage($request->image, 'service_images');


            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/service_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/service_images/"  . $filename   . ".webp";
        }

        $data['en']['slug'] = str_replace(' ', '-', $data['en']['name']);
        $data['ar']['slug'] = str_replace(' ', '-', $data['ar']['name']);


        Service::create($data);


        Toastr::success(t('Add Success'));

        return redirect()->route('service.index');
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
        $service = Service::find($id);
        if (!$service) {
            Toastr::error(t('Not Found'));
            return redirect()->route('service.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.dashboard.service.edit")->with('service', $service)->with('validator', $validator);
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


        $service = Service::find($id);
        if (!$service) {
            Toastr::error(t('Not Found'));
            return redirect()->route('service.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $request->validate($this->validationRules);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $this->delete_previous_image($service->image);
            $data['image'] = $this->uploadImage($request->image, 'service_images');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/service_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/service_images/"  . $filename   . ".webp";
        }



        $data['en']['slug'] = str_replace(' ', '-', $data['en']['name']);
        $data['ar']['slug'] = str_replace(' ', '-', $data['ar']['name']);


        $service->update($data);

        Toastr::success(t('Edit Success'));
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            Toastr::error(t('Not Found'));
            return redirect()->route('service.index');
        }
        $this->delete_previous_image($service->image);

        $service->delete();

        Toastr::success(t('Add Success'));
        return redirect()->route('service.index');
    }
}
