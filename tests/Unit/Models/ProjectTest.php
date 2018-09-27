<?php

namespace Tests\Unit\Models;

use App\Models\Project;
use App\Models\Upload;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test */
    public function it_should_have_many_uploads()
    {
        $p = new Project();
        $relation = $p->uploads();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $relation);
        $this->assertEquals('project_id', $relation->getForeignKeyName());
    }
}
