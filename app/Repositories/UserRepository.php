<?php

namespace App\Repositories;
use App\User;

class UserRepository implements UserRepositoryInterface{

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAllsavedArticlesByUser($id){
        $user = $this->user->find($id);
        return $user->whereHas('savedArticles', function($q) {
            $q->where('is_published', true);
        })->get();
    }

    public function getUserArticles($id){
        $user = $this->user->find($id);
        return $user->authoredArticles;
    }

}