<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaderShipTranslation extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'job'];
}
