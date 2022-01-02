<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Project extends Model
{
    use SoftDeletes, Translatable;
    protected $fillable  = [
        'service_id',
        'image',
        'project_cost',
        'project_bulid_date',
        'status',
        'view_status'
    ];
    public $translatedAttributes = [
        'project_name',
        'project_slug',
        'location',
        'project_type',
        'client_name',
        'description'
    ];
    protected $appends  = ['status_value', 'service_name'];

    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }

    public function getStatusValueAttribute()
    {
        switch ($this->status) {
            case '1':
                return  "<span class='badge badge-success'>" . t("Active") . "</span>";
            case '0':
                return  "<span class='badge badge-danger'>" . t("inactive") . "</span>";
            default:
                '';
        }
    }



    public function services()
    {
        return $this->belongsToMany(Service::class, 'project_services');
    }

    public function getServiceNameAttribute()
    {
        if ($this->services) {
            $value = '';
            foreach ($this->services as  $service) {
                $value .=  $service->name . ' - ';
            }
            return rtrim($value, ' - ');
        } else {
            return null;
        }
    }



    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
