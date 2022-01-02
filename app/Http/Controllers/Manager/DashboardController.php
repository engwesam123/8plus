<?php

namespace App\Http\Controllers\Manager;

use App\Company;
use App\Contact;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Project;
use App\Service;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:super_admin')->only(['index', 'userProfile']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();
        $clients = Company::all();
        $partners = Partner::all();
        $contacts = Contact::all();
        $services = Service::all();
        $projects = Project::all();
        $sliders = Slider::all();
        $latest_contacts = Contact::take(5)->get();
        $latest_projects = Project::take(5)->get();
        $latest_employees = Employee::take(5)->get();
        $latest_clients = Company::take(5)->get();
        $latest_partners = Partner::take(5)->get();

        return view('Manager.dashboard.index')
            ->with('latest_clients', $latest_clients)
            ->with('latest_partners', $latest_partners)
            ->with('latest_employees', $latest_employees)
            ->with('latest_contacts', $latest_contacts)
            ->with('latest_projects', $latest_projects)
            ->with('contacts', $contacts)
            ->with('partners', $partners)
            ->with('services', $services)
            ->with('projects', $projects)
            ->with('sliders', $sliders)
            ->with('clients', $clients)
            ->with('users', $users)
            ->with('employees', $employees);
    }





    public function userProfile()
    {
        $user = auth()->user();

        $this->validationRules["current_password"] = 'nullable';
        $this->validationRules["new_password"] = 'nullable|min:6';
        $this->validationRules["confirm_password"] = 'required_with:new_password|same:new_password';
        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:managers,email,' . $user->id;
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);

        return view('Manager.dashboard.profile.index')
            ->with('validator', $validator)
            ->with('user', $user);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $this->validationRules["name"] = 'required';
        $this->validationRules["email"] = 'required|unique:managers,email,' . $user->id;
        $this->validationRules["current_password"] = 'nullable';
        $this->validationRules["new_password"] = 'nullable|min:6';
        $this->validationRules["confirm_password"] = 'required_with:new_password|same:new_password';

        $request->validate($this->validationRules);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->file('image') ? $this->uploadImage($request->image, 'user_image') : $user->image,
        ]);


        if ($request->current_password) {

            if (!Hash::check($request->current_password, $user->password)) {
                Toastr::error("كلمة المرور القديمة غير صحيحة");
                return redirect()->back();
            } else {
                $user->update([
                    'password' => $request->get('new_password') ? bcrypt($request->get('new_password')) : $user->password,
                ]);
            }
        }

        Toastr::success(t("Success To Update Item"));

        return redirect()->route('userProfile');
    }
}
