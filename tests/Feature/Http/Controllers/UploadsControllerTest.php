<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use App\Models\Upload;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UploadsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_show_the_index_of_uploads()
    {
        $projects = factory(Project::class, 5)->create()->each(function ($p) {
            $p->uploads()->saveMany(factory(Upload::class, 2)->make());
        });

        $response = $this->get(route('uploads.index'));

        $response->assertStatus(200);
        $response->assertViewHas('uploads');
    }
}