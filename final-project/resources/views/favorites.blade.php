@extends('layout')

@section('title', 'Favorites')

@section('main')
    <h1>Favorites</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Favorite Time</th>
            <th scope="col">Comment</th>
            <th scope="col">Delete</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($favorites as $anime)
                <tr key={{$anime->anime_id}}>
                    <td>
                        <img src={{$anime->thumbnail_link}} alt={{$anime->name}}>
                    </td>
                    <td>
                        <a style="text-decoration:none" href="/animes/{{ $anime->anime_id }}">{{$anime->name}}</a>
                    </td>
                    <td>
                        {{ date_format($anime->created_at, 'n/j/Y') }} at {{ date_format($anime->created_at, 'g:i A') }}
                    </td>
                    <td>
                        <form action="{{ route('comments', ['anime_id' => $anime->anime_id]) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Comment
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('favorites.delete', ['anime_id' => $anime->anime_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection