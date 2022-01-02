<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTranslation extends Model
{

    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'slug'];
}
