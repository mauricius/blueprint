<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Project;
use App\Models\Upload;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_return_a_specific_project()
    {
        $projects = factory(Project::class, 3)->create()->each(function ($p) {
            $p->uploads()->saveMany(factory(Upload::class, rand(0,1))->make());
        });

        $project = $projects->first();

        $response = $this->json("GET", route("api::projects.index", $project->id));

        $response
            ->assertStatus(200)
            ->assertJson(
                array_merge(
                    $project->toArray(),
                    ['uploads' => $project->uploads->toArray()]
                )
            );

    }
}

