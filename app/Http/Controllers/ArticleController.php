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
        $user_id = Auth::user()->id;
        $articles = $this->article->showAllPublished($user_id);
        return view('blog.savedlist')->with('articles',$articles);
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
        $comments = $article->comments;
        return view('blog.article')
            ->with('article',$article)
            ->with('author',$author_name)
            ->with('comments',$comments);
    }

    public function save($id) {
        $user_id = Auth::user()->id;
        $article = $this->article->saveArticletoUser($id, $user_id);
        if($article){
            return redirect()->route('view-article', ['id' => $id, 'success'=> true]);
        }
        return redirect()->route('view-article', ['id' => $id]);
    }

    public function unsave($id) {
        $user_id = Auth::user()->id;
        $article = $this->article->unsaveArticletoUser($id, $user_id);
        if($article){
            return redirect()->route('view-article', ['id' => $id, 'success'=> true]);
        }
        return redirect()->route('view-article', ['id' => $id]);

    }

    public function publish($id) {
        $article = $this->article->publish($id);
        if($article){
            return redirect()->route('view-article', ['id' => $id, 'success'=> true]);
        }
        return redirect()->route('view-article', ['id' => $id]);

    }

    public function unpublish($id) {
        $article = $this->article->unpublish($id);
        if($article){
            return redirect()->route('view-article', ['id' => $id, 'success'=> true]);
        }
        return redirect()->route('view-article', ['id' => $id]);
    }
}
