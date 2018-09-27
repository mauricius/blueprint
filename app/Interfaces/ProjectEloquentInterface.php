<?php

namespace App\Interfaces;

interface ProjectEloquentInterface extends BaseEloquentInterface
{
    /**
     * Attach an Upload to the resource.
     *
     * @param  $id
     * @param  array  $data
     * @return mixed
     */
    public function attachUpload($id, array $data);
}

