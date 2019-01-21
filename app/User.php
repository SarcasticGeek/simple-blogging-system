<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function savedArticles() {
        return $this->belongsToMany('App\Article','user_article');
    }

    public function authoredArticles() {
        return $this->hasMany('App\Article', 'author_id');
    }

    public function cats()  {
        return $this->belongsToMany('App\Cat', 'user_cat');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
