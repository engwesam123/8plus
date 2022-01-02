<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HowWorkTranslation extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'slug'];
}
