<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ProjectEloquentInterface;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * @var ProjectEloquentInterface
     */
    protected $projects;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectEloquentInterface $projects
     */
    public function __construct(ProjectEloquentInterface $projects)
    {
        $this->projects = $projects;
    }

    /**
     * Display a JSON representation of the specified resource.
     *
     * @param  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        return $this->projects->find($id, ['uploads']);
    }
}