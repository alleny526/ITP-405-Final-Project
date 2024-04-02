@extends('layout')

@section('title', 'Daily Anime')

@section('main')
    <h1>Daily Anime List</h1>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Monday
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[0]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Tuesday
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[1]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Wednesday
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[2]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Thursday
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[3]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Friday
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[4]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Saturday
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[5]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Sunday
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table className="table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($response[6]->items as $anime)
                                <tr key={{$anime->id}}>
                                    <td>
                                        <img src={{$anime->images ? $anime->images->small : null}} alt={{$anime->name}}>
                                    </td>
                                    <td>
                                        {{$anime->name}}
                                    </td>
                                    <td>
                                        Bookmark
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection