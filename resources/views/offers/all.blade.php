@extends('layouts.app')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}

                            <span class="sr-only">(current)</span>

                        </a>
                    </li>
                @endforeach


            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card-header">{{__('messages.Select All Offers Data')}}</div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('messages.Offer Name')}}</th>
                        <th scope="col">{{__('messages.Offer Price')}}</th>
                        <th scope="col">{{__('messages.Operations')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($All as $all)
                        <tr>
                            <th scope="row">{{$all->id}}</th>
                            <td>{{$all->name}}</td>
                            <td>{{$all->price}}</td>
                            <td><a href="{{url('offers/edit/'.$all->id)}}" class="btn btn-success">{{__('messages.update')}}</a></td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>




                </div>
            </div>
        </div>
@endsection
