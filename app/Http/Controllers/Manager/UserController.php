<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin')->only(['index', 'getUserData']);
        $this->middleware('role:super_admin')->only(['create', 'store']);
        $this->middleware('role:super_admin')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only('destroy');


        $this->validationRules["name"] = 'required';
        $this->validationRules["password"] = 'required|min:6';
        $this->validationRules["email"] = 'required|unique:users,email';
        $this->validationRules["role_id"] = 'required|exists:roles,id';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Manager.dashboard.user.index');
    }


    public function getUserData(Request $request)
    {
        $data = User::get();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $btn = "<img width='50' class='img-thumbnail' height='50' src='" . $row->image . "'>";
                return $btn;
            })

            ->addColumn('role_name', function ($row) {
                $btn = "<span class='badge badge-warning'>" . t($row->roles->first()->name) . "</span>";

                return $btn;
            })

            ->addColumn('action', function ($row) {

                $btn = '';
                $btn .= "<a href=" . route('user.edit', $row->id) . "
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

            ->rawColumns(['action', 'image', 'role_name', 'timeDate'])
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
        $roles = Role::all();

        return view('Manager.dashboard.user.add')
            ->with('roles', $roles)
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
        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : '';

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->image, 'users_image');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/users_image/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/users_image/"  . $filename   . ".webp";
        }

        $user = User::create($data);

        $user->attachRole($request->role_id);


        Toastr::success(t('Add Success'));

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->validationRules["email"] = 'unique:users,email,' . $id;
        $this->validationRules["password"] = 'nullable';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $roles = Role::all();

        $user = User::find($id);
        if (!$user) {
            Toastr::error(t('Not Found'));
            return redirect()->route('user.index');
        }

        return view("Manager.dashboard.user.edit")
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('validator', $validator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validationRules["email"] = 'unique:users,email,' . $id;
        $this->validationRules["password"] = 'nullable';

        $request->validate($this->validationRules);
        $user = User::find($id);
        if (!$user) {
            Toastr::error(t('Not Found'));
            return redirect()->route('user.index');
        }

        $data = $request->all();

        $data['password'] = $request->get('password') ? bcrypt($request->get('password')) : $user->password;


        if ($request->hasFile('image')) {
            $this->delete_previous_image($user->image);
            $data['image'] = $this->uploadImage($request->image, 'users_image');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/users_image/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/users_image/"  . $filename   . ".webp";
        }

        $user->update($data);

        if ($user->id != 1) {
            if ($request->role_id) {
                $user->detachRole($user->roles()->first()->id);
                $user->attachRole($request->role_id);
            }
        }






        Toastr::success(t('Edit Success'));
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            Toastr::error(t('Not Found'));
            return redirect()->route('user.index');
        }
        $this->delete_previous_image($user->image);

        $user->delete();

        Toastr::success(t('Add Success'));
        return redirect()->route('user.index');
    }
}
