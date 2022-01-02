<?php

namespace App\Http\Controllers\Manager;

use App\HowWork;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;

class HowworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:super_admin|editor')->only(['index', 'getHowWorkData']);
        $this->middleware('role:super_admin|editor')->only(['create', 'store']);
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only('destroy');

        $this->validationRules["ar.title"] = 'required';
        $this->validationRules["en.title"] = 'required';
        $this->validationRules["ar.description"] = 'required';
        $this->validationRules["en.description"] = 'required';
        $this->validationRules["image"] = 'required|image';
    }


    public function index()
    {
        return view('Manager.dashboard.how_work.index');
    }

    public function getHowWorkData(Request $request)
    {

        $data = HowWork::get();
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

            ->addColumn('action', function ($row) {

                $btn = '';
                $btn .= "<a href=" . route('how_works.edit', $row->id) . "
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

            ->rawColumns(['action', 'image', 'timeDate'])
            ->make(true);
    }

    public function create()
    {
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view('Manager.dashboard.how_work.add')->with('validator', $validator);
    }

    public function store(Request $request)
    {

        $request->validate($this->validationRules);
        $data = $request->all();

        if ($request->hasFile('image')) {

            $data['image'] = $this->uploadImage($request->image, 'How_work_images');


            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/how_work_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/how_work_images/"  . $filename   . ".webp";
        }

        $data['en']['slug'] = str_replace(' ', '-', $data['en']['title']);
        $data['ar']['slug'] = str_replace(' ', '-', $data['ar']['title']);


       HowWork::create($data);

        Toastr::success(t('Add Success'));

        return redirect()->route('how_works.index');
    }


    public function edit($id)
    {
        $howwork = HowWork::find($id);
        if (!$howwork) {
            Toastr::error(t('Not Found'));
            return redirect()->route('how_works.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.dashboard.how_work.edit")->with('howwork', $howwork)->with('validator', $validator);
    }

    public function update(Request $request, $id)
    {


        $howwork = HowWork::find($id);
        if (!$howwork) {
            Toastr::error(t('Not Found'));
            return redirect()->route('how_works.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $request->validate($this->validationRules);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $this->delete_previous_image($howwork->image);
            $data['image'] = $this->uploadImage($request->image, 'how_work_images');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/service_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/service_images/"  . $filename   . ".webp";
        }



        $data['en']['slug'] = str_replace(' ', '-', $data['en']['title']);
        $data['ar']['slug'] = str_replace(' ', '-', $data['ar']['title']);


        $howwork->update($data);

        Toastr::success(t('Edit Success'));
        return redirect()->route('how_works.index');
    }


    public function destroy($id)
    {
        $howwork = HowWork::find($id);
        if (!$howwork) {
            Toastr::error(t('Not Found'));
            return redirect()->route('how_works.index');
        }
        $this->delete_previous_image($howwork->image);

        $howwork->delete();

        Toastr::success(t('Add Success'));
        return redirect()->route('how_works.index');
    }
}
