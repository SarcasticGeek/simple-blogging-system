<?php

namespace App\Repositories;

interface UserRepositoryInterface
{

    public function getAllsavedArticlesByUser();

    public function getUserArticles();
}