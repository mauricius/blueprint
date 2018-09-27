<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use App\Models\Upload;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_show_a_paginated_index_of_projects()
    {
        $projects = factory(Project::class, 3)->create();

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertViewHas('projects'); // LengthAwarePaginator
    }

    /** @test */
    public function it_should_show_the_page_of_a_single_project()
    {
        $project = factory(Project::class)->create();

        $project->uploads()->saveMany(factory(Upload::class, 1)->make());

        $response = $this->get(route('projects.show', $project->id));

        $response->assertStatus(200);
        $response->assertSee($project->name);
        $response->assertSee($project->uploads->first()->filename);
        $response->assertViewHas('project');
    }

    /** @test */
    public function it_should_upload_a_file_for_a_project()
    {
        Storage::fake('public');

        $project = factory(Project::class)->create();

        $response = $this->json('POST', route('projects.upload', $project->id), [
            'file' => $file = UploadedFile::fake()->create('filename.txt', 1024)
        ]);

        $this->assertDatabaseHas('uploads', [
            'filename' => $file->hashName(),
            'extension' => 'txt',
            'original_filename' => 'filename.txt'
        ]);

        Storage::disk('public')->assertExists("uploads/" . $file->hashName());
    }
}