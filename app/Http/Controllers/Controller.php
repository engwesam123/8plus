<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $validationRules = [];
    protected $validationRulesUserLeave = [];
    protected $validationRulesUserHour = [];
    protected $validationRulesUserSalary = [];


    protected $validationMessages = [];



    // For Upplode Images
    protected function uploadImage($file, $path = '')
    {
        $fileName = $file->getClientOriginalName();
        $file_exe = $file->getClientOriginalExtension();
        $new_name = uniqid() . '.' . $file_exe;
        $directory = 'uploads' . '/' . $path; //.'/'.date("Y").'/'.date("m").'/'.date("d");
        $destienation = public_path($directory);
        $file->move($destienation, $new_name);
        return  $directory . '/' . $new_name;
    }

    // For Delete Images
    protected function delete_previous_image($image_path)
    {
        if ($image_path) {
            $file_path = Str::after($image_path, asset(''));
            Storage::disk('public_uploads')->delete($file_path);
        }
    }


    protected function storeWebpImage($file, $folder)
    {
        $image = $file;
        $filename = uniqid() . $image->getClientOriginalExtension();
        Image::make($image)->encode('webp')
            ->save(public_path("uploads/" . $folder . '/'  . $filename   .  ".webp"));
        $data['image'] = "uploads/" . $folder . '/'  . $filename   .  ".webp";
    }


    // Hleper Function For Api
    protected function sendResponse($result, $message = 'success', $code = 200)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'status' => $code,
        ];
        return response()->json($response, 200);
    }

    protected function sendError($error, $code = 422, $errorMessages = [])
    {
        $response = [
            'success' => false,
            'message' => $error,
            'status' => $code,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
