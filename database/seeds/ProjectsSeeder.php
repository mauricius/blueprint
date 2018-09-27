<?php

use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Upload;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 50)->create()->each(function ($p) {
            $p->uploads()->saveMany(factory(Upload::class, rand(0,3))->make());
        });
    }
}
