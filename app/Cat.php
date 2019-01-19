<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function authors()
    {
        return $this->belongsToMany('App\User');
    }
}
