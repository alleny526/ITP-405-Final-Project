@extends('layout')

@section('title', 'Comments')

@section('main')
    <h1><a style="text-decoration:none" href="/animes/{{ $anime->anime_id }}">{{$anime->name}}</a> Comments</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form class="row g-6" action="{{ route('comments.store', ['anime_id' => $anime->anime_id]) }}" method="POST">
        @csrf
        <div class="col-3">
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">
                Comment
            </button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User name</th>
            <th scope="col">Content</th>
            <th scope="col">Comment time</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr key={{$comment->id}}>
                    <td>
                        {{ Auth::user()->find($comment->user_id)->name }}
                    </td>
                    <td>
                        {{$comment->content}}
                    </td>
                    <td>
                        {{ date_format($comment->created_at, 'n/j/Y') }} at {{ date_format($comment->created_at, 'g:i A') }}
                    </td>
                    <td>
                        @if (Auth::user()->id == $comment->user_id)
                            <form class="row g-3" action="{{ route('comments.update', ['comment_id' => $comment->id, 'anime_id' => $anime->anime_id]) }}" method="POST">
                                @csrf
                                <div class="col-auto">
                                    <textarea class="form-control" id="content" name="content" placeholder="{{$comment->content}}"></textarea>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->id == $comment->user_id)
                        <form action="{{ route('comments.delete', ['comment_id' => $comment->id, 'anime_id' => $anime->anime_id]) }}" method="POST">
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