<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use App\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Str;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin|editor')->only(['index', 'getContactData']);
        $this->middleware('role:super_admin|editor')->only(['create', 'store']);
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Manager.dashboard.contact.index');
    }


    public function getContactData(Request $request)
    {


        $data = Contact::all();
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('timeDate', function ($row) {
                $btn = $row->created_at;
                return $btn;
            })

            ->addColumn('message', function ($row) {
                $btn = Str::limit($row->message, 30, '');
                return $btn;
            })

            ->addColumn('subject', function ($row) {
                $btn = Str::limit($row->subject, 30, '');
                return $btn;
            })


            ->addColumn('action', function ($row) {
                $btn = '';

                $btn .= "<a href=" . route('contact.show', $row->id) . "
                                class=' btn btn-outline-primary btn-sm  btn-icon btn-icon-sm'>
                                <i class='fal fa-eye'></i>
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

            ->rawColumns(['action', 'timeDate'])
            ->make(true);
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            Toastr::error(t('Not Found'));
            return redirect()->route('contact.index');
        }

        return view('Manager.dashboard.contact.show')->with('contact', $contact);
    }


    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            Toastr::error(t('Not Found'));
            return redirect()->route('contact.index');
        }
        $contact->delete();

        Toastr::success(t('Add Success'));
        return redirect()->route('contact.index');
    }
}
