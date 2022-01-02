<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['blog_name', 'description', 'keywords', 'address'];
}
