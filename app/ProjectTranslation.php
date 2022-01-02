<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTranslation extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'project_name',
        'project_slug',
        'location',
        'project_type',
        'client_name',
        'description'
    ];
}
