<!DOCTYPE html>
@extends('layouts.app')


@section('content')
    <div class="container-sm">
        <div class="row justify-content-md-center">
            <header class="col-md-12 text-center" style="top: 3vw">
                <h1 style="color: cyan">{{$post->title}}</h1>
            </header>
            <div class="col-md-8" style="color: cyan;font-size: 18px">
                <div class=textBorder>
                    @if($post->image != '*')
                        <img src="{{$post->image}}" alt="img" style="width: 100%">
                    @endif
                    <div style="height: 5vw"></div>
                    <p>{{$post->text}}
                    </p>
                    <p>Zdroj :{{$post->source}} , pridal užívateľ {{$post->username}}.
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
