<?php

namespace App\Repositories;

use App\Interfaces\UploadEloquentInterface;
use App\Models\Upload;

class UploadEloquentRepository extends BaseEloquentRepository implements UploadEloquentInterface
{
    protected $modelName = Upload::class;
}
