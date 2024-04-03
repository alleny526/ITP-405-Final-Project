<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;
use App\Models\Favorite;

use Auth;

class FavoriteController extends Controller
{
    //

    public function index()
    {
        $user_id = Auth::user()->id;

        return view('favorites', [
            'favorites' => Anime::join('favorites', 'favorites.anime_id', '=', 'animes.anime_id')
                ->where('favorites.user_id', '=', $user_id)
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    public function store($anime_id)
    {
        $user_id = Auth::user()->id;
        $favorite = new Favorite();
        $favorite->anime_id = $anime_id;
        $favorite->user_id = $user_id;
        $favorite->save();

        return redirect()
            ->route('favorites')
            ->with('success', "Successfully added {$favorite->anime_id}");
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
