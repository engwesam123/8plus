<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use App\ManagerWord;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class ManagerWordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);

        $this->validationRules["ar.name"] = 'required';
        $this->validationRules["en.name"] = 'required';
        $this->validationRules["en.description"] = 'required';
        $this->validationRules["ar.description"] = 'required';
        $this->validationRules["en.job"] = 'required';
        $this->validationRules["ar.job"] = 'required';
        $this->validationRules["image"] = 'required|image';
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager_word = ManagerWord::find($id);
        if (!$manager_word) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }

        $this->validationRules["image"] = 'nullable|image';

        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.dashboard.manager_word.edit")->with('manager_word', $manager_word)->with('validator', $validator);
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


        $manager_word = ManagerWord::find($id);
        if (!$manager_word) {
            Toastr::error(t('Not Found'));
            return redirect()->route('manager_word.index');
        }

        $this->validationRules["image"] = 'nullable|image';

        $request->validate($this->validationRules);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $this->delete_previous_image($manager_word->image);

            $data['image'] = $this->uploadImage($request->image, 'manager_word_images');

            // $image = $request->file('image');
            // $filename = uniqid() . $image->getClientOriginalExtension();
            // Image::make($image)->encode('webp')
            //     ->save(public_path("uploads/manager_word_images/" . $filename   .  ".webp"));
            // $data['image'] = "uploads/manager_word_images/"  . $filename   . ".webp";
        }


        $manager_word->update($data);


        Toastr::success(t('Edit Success'));
        return redirect()->back();
    }
}
