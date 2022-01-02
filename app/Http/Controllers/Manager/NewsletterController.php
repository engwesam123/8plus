<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class NewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin|editor')->only(['index', 'getNewsletterData']);
    }

    public function index()
    {
        return view('Manager.dashboard.news_letter.index');
    }


    public function getNewsletterData(Request $request)
    {
        $data = Newsletter::get();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })


            ->rawColumns(['timeDate'])
            ->make(true);
    }
}
