<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use App\LeaderShip;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class LeaderShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin|editor')->only(['index', 'getLeaderShipData']);
        $this->middleware('role:super_admin|editor')->only(['create', 'store']);
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only('destroy');

        $this->validationRules["ar.name"] = 'required';
        $this->validationRules["en.name"] = 'required';
        $this->validationRules["ar.description"] = 'required';
        $this->validationRules["en.description"] = 'required';
        $this->validationRules["ar.job"] = 'required';
        $this->validationRules["en.job"] = 'required';
        $this->validationRules["image"] = 'required|image';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.leader_ship.index');
    }


    public function getLeaderShipData(Request $request)
    {

        $data = LeaderShip::get();
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
                $btn .= "<a href=" . route('leader_ship.edit', $row->id) . "
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view('Manager.dashboard.leader_ship.add')->with('validator', $validator);
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
            $data['image'] = $this->uploadImage($request->image, 'leader_ship_images');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/leader_ship_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/leader_ship_images/"  . $filename   . ".webp";
        }



        LeaderShip::create($data);

        Toastr::success(t('Add Success'));

        return redirect()->route('leader_ship.index');
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
        $leader_ship = LeaderShip::find($id);
        if (!$leader_ship) {
            Toastr::error(t('Not Found'));
            return redirect()->route('leader_ship.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.dashboard.leader_ship.edit")->with('leader_ship', $leader_ship)->with('validator', $validator);
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


        $leader_ship = LeaderShip::find($id);
        if (!$leader_ship) {
            Toastr::error(t('Not Found'));
            return redirect()->route('leader_ship.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $request->validate($this->validationRules);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $this->delete_previous_image($leader_ship->image);
            $data['image'] = $this->uploadImage($request->image, 'leader_ship_images');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/leader_ship_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/leader_ship_images/"  . $filename   . ".webp";
        }

        $leader_ship->update($data);


        Toastr::success(t('Edit Success'));
        return redirect()->route('leader_ship.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leader_ship = LeaderShip::find($id);
        if (!$leader_ship) {
            Toastr::error(t('Not Found'));
            return redirect()->route('leader_ship.index');
        }
        $this->delete_previous_image($leader_ship->image);

        $leader_ship->delete();

        Toastr::success(t('Add Success'));
        return redirect()->route('leader_ship.index');
    }
}
