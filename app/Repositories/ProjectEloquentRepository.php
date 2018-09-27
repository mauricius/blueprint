<?php namespace App\Repositories;

use App\Interfaces\ProjectEloquentInterface;
use App\Models\Project;

class ProjectEloquentRepository extends BaseEloquentRepository implements ProjectEloquentInterface
{
    protected $modelName = Project::class;

    /**
     * Attach an Upload to the resource.
     *
     * @param  $id
     * @param  array  $data
     * @return Project
     */
    public function attachUpload($id, array $data)
    {
        $project = $this->find($id);

        $project->uploads()->create($data);

        return $project;
    }
}
