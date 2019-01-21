<?php

namespace App\Repositories;

interface ArticleRepositoryInterface
{
    public function create($data,$cat_ids);

    public function update($id, $data);

    public function delete($id);

    public function show($id);

    public function publish($id);

    public function unpublish($id);

    public function saveArticletoUser($id, $user_id);

    public function unsaveArticletoUser($id, $user_id);

    public function showAllPublished($user_id);

    public function showAllComments();
}
