<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CatRepository;
use App\Cat;
use Auth;

class CatController extends Controller
{
    protected $cat;

    public function __construct(Cat $cat) {
        $this->cat = new CatRepository($cat);
    }

    public function getarticles($id) {
        $articles = $this->cat->filterPublishedArticlesByCat($id);
        return view('blog.savedlist')->with('articles',$articles);
    }
}
