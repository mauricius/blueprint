<?php

namespace Tests\Unit\Models;

use App\Models\Project;
use App\Models\Upload;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class UploadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_belong_to_a_project()
    {
        $u = new Upload();
        $relation = $u->project();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $relation);
        $this->assertEquals('project_id', $relation->getForeignKey());
        $this->assertEquals('id', $relation->getOwnerKey());
    }

    /** @test */
    public function it_should_return_the_public_url_of_the_upload()
    {
        $project = factory(Project::class)->create();

        $upload = $project->uploads()->save(factory(Upload::class)->make([
            "filename" => "random_filename.pdf"
        ]));

        $this->assertEquals(asset("uploads/random_filename.pdf"), $upload->url);
    }
}
