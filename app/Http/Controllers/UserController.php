<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\User;
use Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user) {
        $this->user = new UserRepository($user);
    }

    public function showMyArticles(){
        $current_user = Auth::user()->id;
        $articles = $this->user->getUserArticles($current_user);
        return view('blog.list')->with('articles',$articles);
    }

    public function showMySavedArticles(){
        $current_user = Auth::user()->id;
        $articles = $this->user->getAllsavedArticlesByUser($current_user);
        return view('blog.savedlist')->with('articles',$articles);
    }
}
