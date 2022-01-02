<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryDate extends Model
{
    use SoftDeletes;
    protected $fillable  = [
        'history_id',
        'history_date',
        'content_ar',
        'content_en',
    ];
}
