<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index() {
        return view('home');
    }

    function add() {
        return view('blog.add');
    }
}
