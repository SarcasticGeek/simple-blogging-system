<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository implements ArticleRepositoryInterface {

    protected $article;

    public function __construct(Article $article){
        $this->article = $article;
    }

    public function create($data){
        return $this->article->create($data);
    }

    public function update($id, $data){
        $article_ = $this->article->find($id);
        return $article_->update($data);
    }

    public function delete($id){
        return $this->article->destroy($id);
    }

    public function show($id){
        return $this->article->findOrFail($id);
    }

    public function publish($id){
        $article_ = $this->article->find($id);
        $article_->is_published = true;
        return $article_->save();
    }

    public function unpublish($id){
        $article_ = $this->article->find($id);
        $article_->is_published = false;
        return $article_->save();
    }


    public function saveArticletoUser($id, $user_id){
        $article_ = $this->article->find($id);
        return $article_->savedUsers()->attach($user_id);
    }

    public function showAllPublished(){
        return $this->article->where('is_published',true)->get();
    }

    public function showAllComments(){
        return $this->article->comments;
    }

}