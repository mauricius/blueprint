<?php

namespace App\Models;

use App\Models\Project;

class Upload extends BaseModel
{
    public $incrementing = true;

    protected $appends = ['url'];

    protected $fillable = [
        'filename',
        'extension',
        'original_filename',
        'mimetype',
        'size'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getUrlAttribute()
    {
        return asset("uploads/" . $this->filename);
    }
}
