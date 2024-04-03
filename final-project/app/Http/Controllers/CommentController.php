<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;
use App\Models\Comment;

use Auth;

class CommentController extends Controller
{
    //
    
    public function show($anime_id)
    {
        return view('comments', [
            'comments' => Comment::join('animes', 'comments.anime_id', '=', 'animes.anime_id')
                ->orderBy('created_at', 'desc')
                ->select('comments.*', 'animes.name', 'animes.anime_id')
                ->get(),
            'anime' => Anime::where('anime_id', '=', $anime_id)->first()
        ]);
    }

    public function store(Request $request, $anime_id)
    {
        $request->validate([
            'content' => 'required',
        ]);
        
        $user_id = Auth::user()->id;
        $comment = new Comment();
        $comment->anime_id = $anime_id;
        $comment->user_id = $user_id;
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()
            ->route('comments', [
                'anime_id' => $anime_id,
                'anime' => Anime::where('anime_id', '=', $anime_id)->first()
                ])
            ->with('success', "Successfully added {$comment->content}");
    }

    public function update(Request $request, $comment_id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        dd($comment_id);

        $comment = Comment::where('id', '=', $comment_id)->first();
        $comment->content = $request->input('content');
        $comment->save();        

        return redirect()
            ->route('comments', [
                'anime_id' => $comment->anime_id,
                'anime' => Anime::where('anime_id', '=', $comment->anime_id)->first()
                ])
            ->with('success', "Successfully updated {$comment->content}");
    }

    public function delete($comment_id)
    {
        $comment = Comment::where('id', '=', $comment_id)->first();

        return redirect()
            ->route('comments', ['anime_id' => $comment->anime_id])
            ->with('success', "Successfully deleted {$comment->content}");
    }
}
