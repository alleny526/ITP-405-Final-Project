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
                ->get(),
            'anime' => Anime::where('anime_id', '=', $anime_id)->first()
        ]);
    }

    public function store(Request $request, $anime_id)
    {
        $user_id = Auth::user()->id;
        $comment = new Comment();
        $comment->anime_id = $anime_id;
        $comment->user_id = $user_id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()
            ->route('comments', ['anime_id' => $anime->id])
            ->with('success', "Successfully added {$favorite->anime_id}");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'artist' => 'required|exists:artists,ArtistId',
        ]);

        $album = Album::where('AlbumId', '=', $id)->first();
        $album->Title = $request->input('title');
        $album->ArtistId = $request->input('artist');
        $album->save();

        $artist = Artist::where('ArtistId', '=', $request->input('artist'))->first();

        return redirect()
            ->route('albums')
            ->with('success', "Successfully updated {$request->input('title')} by {$artist->Name}");
    }

    public function delete($anime_id)
    {
        $user_id = Auth::user()->id;
        $favorite = Favorite::where(['anime_id', '=', $anime_id], ['user_id', '=', $user_id])->delete();

        return redirect()
            ->route('favorites')
            ->with('success', "Successfully deleted {$anime_id}");
    }
}
