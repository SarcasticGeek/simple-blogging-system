<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(Comment $comment) {
        $this->comment = new CommentRepository($comment);
    }

    public function create(Request $request, $id) {
        $this->validate($request, [
            'body' => 'required|max:200',
        ]);

        $user_id = Auth::user()->id;

        $comment = $this->comment->create([
            'body' => $request->body,
            'user_id' => $user_id,
            'article_id' => $id
        ]);
        if($comment){
            return redirect()->route('view-article', ['id' => $id, 'success' => 'true']);
        }
        return redirect()->route('view-article', ['id' => $id, 'success' => 'false']);
    }
}
