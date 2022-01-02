<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;

use App\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('role:super_admin|editor')->only(['edit', 'update']);


        $this->validationRules["ar.blog_name"] = 'required';
        $this->validationRules["en.blog_name"] = 'required';
        $this->validationRules["email"] = 'nullable|email';
        $this->validationRules["phone"] = 'nullable';
        $this->validationRules["logo"] = 'nullable|image';
        $this->validationRules["miniLogo"] = 'nullable|image';
        $this->validationRules["facebook"] = 'nullable';
        $this->validationRules["twitter"] = 'nullable';
        $this->validationRules["whatsapp"] = 'nullable';
        $this->validationRules["snapchat"] = 'nullable';
        $this->validationRules["instagram"] = 'nullable';
        $this->validationRules["linkedin"] = 'nullable';
        $this->validationRules["description"] = 'nullable';
        $this->validationRules["address"] = 'nullable';
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }
        $validator = JsValidator::make($this->validationRules, $this->validationMessages);
        return view("Manager.dashboard.setting.edit")->with('setting', $setting)->with('validator', $validator);
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
        $setting = Setting::find($id);
        if (!$setting) {
            Toastr::error(t('Not Found'));
            return redirect()->route('dashboard');
        }

        $request->validate($this->validationRules);

        $data = $request->all();



        if ($request->hasFile('logo')) {
            $this->delete_previous_image($setting->logo);

            $data['logo'] = $this->uploadImage($request->logo, 'setting_images');

            // $logo = $request->file('logo');
            // $logo_filename = uniqid() . $logo->getClientOriginalExtension();
            // Image::make($logo)->encode('webp')
            //     ->save(public_path("uploads/setting_images/" . $logo_filename   .  ".webp"));
            // $data['logo'] = "uploads/setting_images/"  . $logo_filename   . ".webp";
        }
        if ($request->hasFile('miniLogo')) {
            $this->delete_previous_image($setting->miniLogo);
            $data['miniLogo'] = $this->uploadImage($request->miniLogo, 'setting_images');

            // $miniLogo = $request->file('miniLogo');
            // $miniLogo_filename = uniqid() . $miniLogo->getClientOriginalExtension();
            // Image::make($miniLogo)->encode('webp')
            //     ->save(public_path("uploads/setting_images/" . $miniLogo_filename   .  ".webp"));
            // $data['miniLogo'] = "uploads/setting_images/"  . $miniLogo_filename   . ".webp";
        }
        if ($request->hasFile('default_logo')) {
            $this->delete_previous_image($setting->default_logo);
            $data['default_logo'] = $this->uploadImage($request->default_logo, 'setting_images');

            // $default_logo = $request->file('default_logo');
            // $default_logo_filename = uniqid() . $default_logo->getClientOriginalExtension();
            // Image::make($default_logo)->encode('webp')
            //     ->save(public_path("uploads/setting_images/" . $default_logo_filename   .  ".webp"));
            // $data['default_logo'] = "uploads/setting_images/"  . $default_logo_filename   . ".webp";
        }


        if ($request->hasFile('file')) {
            $this->delete_previous_image($setting->file);
            $data['file'] = $this->uploadImage($request->file, 'setting_images');
    
        }


        $setting->update($data);


        Toastr::success(t('Edit Success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
