<?php

namespace App\Http\Controllers;

use App\About;
use App\Company;
use App\Contact;
use App\History;
use App\HowWork;
use App\LeaderShip;
use App\ManagerWord;
use App\Newsletter;
use App\Partner;
use App\Project;
use App\Service;
use App\Slider;
use App\Visible;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class UIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = Slider::where('status', 1)->get();
        $how_works = HowWork::all();
        $services = Service::all();
        $projects = Project::where('status', 1)->where('view_status', 1)->take(7)->get();
        $manager_word = ManagerWord::first();
        $partners = Partner::all();
        $companies = Company::all();
        $about = About::first();
        return view('frontend.index')
            ->with('companies', $companies)
            ->with('about', $about)
            ->with('partners', $partners)
            ->with('manager_word', $manager_word)
            ->with('projects', $projects)
            ->with('services', $services)
            ->with('how_works', $how_works)
            ->with('sliders', $sliders);
    }

    public function aboutCompany()
    {
        $about = About::first();
        $history = History::first();
        $visibles = Visible::all();
        $leader_ships = LeaderShip::all();
        $partners = Partner::all();

        return view('frontend.company')
            ->with('leader_ships', $leader_ships)
            ->with('visibles', $visibles)
            ->with('history', $history)
            ->with('partners', $partners)
            ->with('about', $about);
    }
    public function projects()
    {
        $projects = Project::where('status', 1)->get();
        // return $projects;
        $services = Service::all();
        return view('frontend.projects')
            ->with('services', $services)
            ->with('projects', $projects);
    }

    public function services()
    {
        $services = Service::all();
        return view('frontend.services')
            ->with('services', $services);
    }
    public function projectDetails($id, $project_slug)
    {
        $project = Project::where('status', 1)->where('id', $id)->first();
        if (!$project) {
            Toastr::error(t("The Project Not Found"));
            return redirect()->route('frontend.index');
        }

        return view('frontend.project_deatails')
            ->with('project', $project);
    }

    public function contact()
    {
        return view('frontend.contact');
    }


    public function storeContact(Request $request)
    {
        $validate = $this->validate($request, [
            'full_name'   => 'required|string',
            'subject'   => 'required|max:150|string',
            'email'   => 'required|email',
            'message'   => 'required|max:300|string',
        ]);

        $check = Contact::create($request->all());
        if ($check) {
            return $this->sendResponse(t('Succcess To Send Message'));
        } else {
            return $this->sendError($validate);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
