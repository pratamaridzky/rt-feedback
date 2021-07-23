<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\NewComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {
        $postID = random_int(1,3);
        $comment = Comment::create([
            'body' => 'test dari body '.random_int(0,200),
            'user_id'=>random_int(1,5),
            'post_id'=>$postID
        ]);

        $lastComment = Comment::where('id', $comment->id)->first();
        event(new NewComment($lastComment));
        echo $lastComment->toJson();
    }

    public function testRatchet()
    {
       return view('test');
    }
}
