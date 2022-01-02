<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use App\History;
use App\HistoryDate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);
        $this->middleware('role:super_admin')->only('deleteHistoryDate');

        $this->validationRules["ar.content"] = 'required';
        $this->validationRules["en.content"] = 'required';
        $this->validationRules["image"] = 'required|image';
        $this->validationRules["history_date.*"] = 'required|date_format:Y';
        $this->validationRules["old_history_date.*"] = 'required|date_format:Y';

        $this->validationRules["content_ar.*"] = 'required';
        $this->validationRules["content_en.*"] = 'required';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $validator = JsValidator::make($this->validationRules, $this->validationMessages);
    //     return view('Manager.dashboard.history.add')->with('validator', $validator);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate($this->validationRules);

    //     $data = $request->all();
    //     $data['image'] =  $request->file('image') ? $this->uploadImage($request->image, 'history_image') : 'backend/img/default.jpg';

    //     $history = History::create($data);

    //     foreach ($request->get('history_date', []) as $key => $val) {
    //         HistoryDate::create([
    //             'history_id' => $history->id,
    //             'history_date' =>  $data['history_date'][$key],
    //             'content_ar' =>  $data['content_ar'][$key],
    //             'content_en' => $data['content_en'][$key],
    //         ]);
    //     }
    //     Toastr::success(t('Add Success'));

    //     return redirect()->back();
    // }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $history = History::find($id);
        if (!$history) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.dashboard.history.edit")->with('history', $history)->with('validator', $validator);
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
        $history = History::find($id);
        if (!$history) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }

        $this->validationRules["image"] = 'nullable|image';

        $request->validate($this->validationRules);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $this->delete_previous_image($history->image);
            $data['image'] = $this->uploadImage($request->image, 'history_image');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/history_image/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/history_image/"  . $filename   . ".webp";
        }

        $history->update($data);

        foreach ($request->get('old_history_date_id', []) as $key => $value) {
            $history_date = HistoryDate::query()->find($value);
            if ($history_date) {
                $history_date->update([
                    'history_date' =>  $data['old_history_date'][$key],
                    'content_ar' =>  $data['old_content_ar'][$key],
                    'content_en' => $data['old_content_en'][$key],
                ]);
            }
        }

        foreach ($request->get('history_date', []) as $key => $value) {
            HistoryDate::create([
                'history_id' => $history->id,
                'history_date' =>  $data['history_date'][$key],
                'content_ar' =>  $data['content_ar'][$key],
                'content_en' => $data['content_en'][$key],
            ]);
        }

        Toastr::success(t('Edit Success'));
        return redirect()->back();
    }



    public function deleteHistoryDate($id)
    {
        $history_date = HistoryDate::find($id);
        if (!$history_date) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }
        $history_date->delete();

        Toastr::success(t('Delete Success'));
        return redirect()->back();
    }
}
