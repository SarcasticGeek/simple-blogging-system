<?php

namespace App\Repositories;
use App\Cat;

class CatRepository implements CatRepositoryInterface
{
    protected $cat;

    public function __construct(Cat $cat){
        $this->cat = $cat;
    }

    public function create($data){
        $this->cat->create($data);
    }

    public function delete($id){
        return $this->cat->destroy($id);
    }

    public function showAll(){
        return $this->cat->all();
    }

    public function filterPublishedArticlesByCat($id){
        return $this->cat->whereHas('articles', function($q) {
            $q->where('is_published', true);
        })->get();
    }

    public function filterPublishedArticlesByCatInSaved($id, $user_id){
        #TODO
    }
}