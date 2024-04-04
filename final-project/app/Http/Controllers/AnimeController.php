<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    //

    public function show($anime_id)
    {
        $anime = Http::get("https://api.bgm.tv/v0/subjects/$anime_id")->object();
        $characters = Http::get("https://api.bgm.tv/v0/subjects/$anime_id/characters")->object();

    return view('details',[
        'anime' => $anime,
        'characters' => $characters,
    ]);
    }
}
