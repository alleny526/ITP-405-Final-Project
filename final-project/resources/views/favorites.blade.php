@extends('layout')

@section('title', 'Favorites')

@section('main')
    <h1>Favorites</h1>
    <table className="table">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Favorite Time</th>
            <th scope="col">Delete</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($favorites as $anime)
                <tr key={{$anime->id}}>
                    <td>
                        <img src={{$anime->thumbnail_link}} alt={{$anime->name}}>
                    </td>
                    <td>
                        {{$anime->name}}
                    </td>
                    <td>
                        {{$anime->created_at}}
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