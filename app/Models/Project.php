<?php

namespace App\Models;

use App\Models\Upload;

class Project extends BaseModel
{
    public $incrementing = true;

    protected $fillable = [
        'name',
        'description',
    ];

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
