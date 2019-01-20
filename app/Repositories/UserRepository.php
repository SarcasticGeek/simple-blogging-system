<?php

namespace App\Repositories;
use App\User;

class UserRepository implements UserRepositoryInterface{

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAllsavedArticlesByUser($id){
        $user = $this->user->find($id);
        $articles = $user->savedArticles->filter(function ($item) {
            return $item->is_published;
        })->values();
        return $articles;
    }

    public function getUserArticles($id){
        $user = $this->user->find($id);
        return $user->authoredArticles;
    }

}
