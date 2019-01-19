<?php

namespace App\Repositories;

interface CommentRepositoryInterface
{
    public function create($data);

    public function update($data, $id);

    public function delete($id);
}