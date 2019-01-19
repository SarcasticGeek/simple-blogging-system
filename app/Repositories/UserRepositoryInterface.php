<?php

namespace App\Repositories;

interface UserRepositoryInterface
{

    public function getAllsavedArticlesByUser($id);

    public function getUserArticles($id);
}