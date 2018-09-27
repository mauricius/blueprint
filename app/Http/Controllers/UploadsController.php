<?php

namespace App\Http\Controllers;

use App\Interfaces\UploadEloquentInterface;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    /**
     * @var UploadEloquentInterface
     */
    protected $uploads;

    /**
     * UploadsController constructor.
     *
     * @param UploadEloquentInterface $uploads
     */
    public function __construct(UploadEloquentInterface $uploads)
    {
        $this->uploads = $uploads;
    }

    public function index()
    {
        $uploads = $this->uploads->all('id');

        return view('uploads.index', compact('uploads'));
    }
}
