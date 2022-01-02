<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectServices extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'project_id',
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
