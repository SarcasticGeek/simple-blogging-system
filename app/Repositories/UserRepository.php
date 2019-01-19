<?php

namespace App\Repositories;
use App\User;

class UserRepository implements UserRepositoryInterface{

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getAllsavedArticlesByUser(){
        return $this->user->whereHas('savedArticles', function($q) {
            $q->where('is_published', true);
        })->get();
    }

    public function getUserArticles(){
        return $this->authoredArticles();
    }

}