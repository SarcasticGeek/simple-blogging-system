<?php

namespace App\Repositories;

interface CatRepositoryInterface
{
    public function create($data);

    public function delete($id);

    public function filterPublishedArticlesByCat($cat_id);

    public function showAll();

    public function filterPublishedArticlesByCatInSaved($cat_id, $user_id);
}