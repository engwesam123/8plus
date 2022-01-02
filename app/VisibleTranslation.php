<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisibleTranslation extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
}
