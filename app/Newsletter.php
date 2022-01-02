<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    // النشرة البريدية
    use SoftDeletes;
    protected $fillable = [
        'email',
    ];
}
