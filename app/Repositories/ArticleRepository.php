<?php

namespace App\Repositories;

use App\Article;
use App\Cat;
use DB;

class ArticleRepository implements ArticleRepositoryInterface {

    protected $article;

    public function __construct(Article $article){
        $this->article = $article;
    }

    public function create($data,$cat_ids){
        $article = $this->article->create($data);
        if(sizeof($cat_ids)>0){
            $article->cats()->sync($cat_ids);
        }
        return $article;
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

    public function unsaveArticletoUser($id, $user_id){
        return DB::table('user_article')->where('user_id', $user_id)->where('article_id',$id)->delete();
    }

    public function showAllPublished($user_id){
        $articles = $this->article->where('is_published',true)->get();
        foreach ($articles as $article) {
            if(DB::table('user_article')->where('user_id', $user_id)->where('article_id',$article->id)->first()){
                $article->saved = true;
            }else {
                $article->saved = false;
            }
        }
        return $articles;
    }

    public function showAllComments(){
        return $this->article->comments;
    }

}
