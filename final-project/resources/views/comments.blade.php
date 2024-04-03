@extends('layout')

@section('title', 'Comments')

@section('main')
    <h1>{{$anime->name}} Comments</h1>
    <form action="{{ route('comments.store', ['anime_id' => $anime->anime_id]) }}" method="POST">
        @csrf
        <textarea id="content" name="content"></textarea>
        <button type="submit" class="btn btn-primary">
            Comment
        </button>
    </form>
    <table className="table">
        <thead>
        <tr>
            <th scope="col">User name</th>
            <th scope="col">Content</th>
            <th scope="col">Timestamp   </th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
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
                        @if (Auth::user()->id == $comment->user_id)
                            <form action="{{ route('comments.update', ['comment_id' => $comment->id, 'anime_id' => $anime->anime_id]) }}" method="POST">
                                @csrf
                                <textarea id="content" name="content"></textarea>
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->id == $comment->user_id)
                        <form action="{{ route('comments.delete', ['comment_id' => $comment->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection