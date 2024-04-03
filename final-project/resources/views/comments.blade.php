@extends('layout')

@section('title', 'Comments')

@section('main')
    <h1>{{$anime->name}} Comments</h1>
    <table className="table">
        <thead>
        <tr>
            <th scope="col">User name</th>
            <th scope="col">Content</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr key={{$comment->id}}>
                    <td>
                        {{$comment->user_id}}
                    </td>
                    <td>
                        {{$comment->content}}
                    </td>
                    <td>
                        {{$comment->created_at}}
                    </td>
                    <td>
                        <form action="{{ route('favorites.delete', ['anime_id' => $anime->id]) }}" method="POST">
                            @csrf
                            <textarea></textarea>
                            <button type="submit" class="btn btn-danger">
                                Edit
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('favorites.delete', ['anime_id' => $anime->id]) }}" method="DELETE">
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