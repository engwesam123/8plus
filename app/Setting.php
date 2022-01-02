<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use SoftDeletes, Translatable;
    protected $fillable = [
        'logo',
        'miniLogo',
        'default_logo',
        'file',
        'phone',
        'email',
        'facebook',
        'twitter',
        'whatsapp',
        'snapchat',
        'instagram',
        'linkedin',
        'description',

    ];

    public $translatedAttributes = ['blog_name', 'description', 'keywords', 'address'];



    protected $hidden = ['updated_at', 'deleted_at', 'translations'];




    public function getLogoAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }

    public function getMiniLogoAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }
    public function getDefaultLogoAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }


    public function getFileAttribute($file)
    {
        return is_null($file) ? null : asset($file);
    }


    public function getFileImageAttribute($file)
    {
        if (substr($this->file, -4) == "docx")
            return asset('backend/img/img_files/word.png') ;
        elseif (substr($this->file, -3) == "pdf")
            return asset('backend/img/img_files/pdf.svg');
        elseif (substr($this->file, -4) == "xlsx")
            return asset('backend/img/img_files/excel.png') ;
        else
            return $this->file;
    }



    // For fomated date time
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];
}
