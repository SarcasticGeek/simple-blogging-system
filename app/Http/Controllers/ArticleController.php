<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Repositories\ArticleRepository;
use Auth;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(Article $article) {
        $this->article = new ArticleRepository($article);
    }

    public function index() {
        return view('home');
    }

    public function add() {
        return view('blog.add');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:200'
        ]);

        $user_id = Auth::user()->id;

        $article = $this->article->create([
            'title'=> $request->title,
            'body' => $request->body,
            'author_id' => $user_id
        ]);
        if($article){
            return view('home');
        }
    }

    public function update($id) {
        $article = $this->article->show($id);
        return view('blog.update')->with('article',$article);
    }

    public function updateaction(Request $request, $id) {
        $article = $this->article->update($id,[
            'title'=> $request->title,
            'body' => $request->body
        ]);
        if($article){
            return redirect()->route('view-article', ['id' => $id]);
        }
    }

    public function showone($id) {
        $article = $this->article->show($id);
        $author_name = $article->author->name;
        return view('blog.article')->with('article',$article)->with('author',$author_name);
    }
}
