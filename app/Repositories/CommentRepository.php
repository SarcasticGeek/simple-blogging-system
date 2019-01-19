<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository implements CommentRepositoryInterface{

    public function __construct(Comment $comment){
        $this->comment = $comment;
    }

    public function create($data){
        return $this->comment->create($data);
    }

    public function update($data, $id){
        $comment_ = $this->comment->find($id);
        return $comment_->update($data);
    }

    public function delete($id){
        return $this->comment->destroy($id);
    }
}