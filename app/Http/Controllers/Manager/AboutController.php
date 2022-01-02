<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\About;
use App\AboutImage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:super_admin|editor')->only(['edit', 'update', 'storeImages', 'uplodedImages']);
        $this->middleware('role:super_admin')->only(['deleteImage']);

        $this->validationRules["ar.short_content"] = 'required';
        $this->validationRules["en.short_content"] = 'required';
        $this->validationRules["ar.long_content"] = 'required';
        $this->validationRules["en.long_content"] = 'required';
    }

    public function edit($id)
    {
        $about = About::find($id);
        if (!$about) {
            Toastr::error(t('Not Found'));
            return redirect()->back();
        }
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        $images = AboutImage::where('about_id', $about->id)->get();
        // return $images;
        return view("Manager.dashboard.about.edit")
            ->with('images', $images)
            ->with('about', $about)
            ->with('validator', $validator);
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
        $about = About::find($id);
        if (!$about) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }
        $request->validate($this->validationRules);
        $data = $request->all();

        $about->update($data);
        Toastr::success(t('Edit Success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function storeImages(Request $request, $id)
    {
        $about = About::find($id);
        if (!$about) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }
        $data = $request->all();

        if ($request->hasFile('file')) {
            $data['image'] = $this->uploadImage($request->file, 'about_images');
        }

        $data['about_id'] = $about->id;
        AboutImage::create($data);

        Toastr::success(t('Add Success'));
        return response()->json(["status" => "success", "data" => $data]);
    }


    public function deleteImage(Request $request, $id, $about_id)
    {
        $about = About::find($about_id);
        if (!$about) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }
        $about_image  = AboutImage::where('about_id', $about->id)->where('id', $id)->find($id);
        if (!$about_image) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }

        $this->delete_previous_image($about_image->image);

        $about_image->delete();

        Toastr::success(t('Delete Success'));
        return redirect()->back();
    }


    public function uplodedImages(Request $request, $id)
    {
        $about = About::find($id);
        if (!$about) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }
        $data = AboutImage::where('about_id', $about->id)->get();
        return response()->json(["status" => "success", "data" => $data]);
    }
}
