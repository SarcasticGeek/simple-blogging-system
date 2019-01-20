<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'body', 'author_id'
    ];

    public function author() {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function savedUsers()
    {
        return $this->belongsToMany('App\User', 'user_article');
    }

    public function cats()
    {
        return $this->belongsToMany('App\Cat');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
