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
        return $this->cat->create($data);
    }

    public function delete($id){
        return $this->cat->destroy($id);
    }

    public function showAll(){
        return $this->cat->all();
    }

    public function filterPublishedArticlesByCat($id){
        $cat_ = $this->cat->find($id);
        return $article_ = $cat_->articles->filter(function ($item) {
            return $item->is_published;
        })->values();
    }

    public function filterPublishedArticlesByCatInSaved($id, $user_id){
        #TODO
    }
}
