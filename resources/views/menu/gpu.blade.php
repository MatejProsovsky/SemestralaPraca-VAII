@extends('layouts.app')

@section('content')


    <div class="container-sm" style="width: 73vw">
        <div class="row justify-content-md-center">
            <header class="col-md-12 text-center" style="top: 3vw">
                <h1>GPU</h1>
            </header>
            @for($i = count($grid) - 1;$i >= 0; $i-- )
                <div class="col-md-5" style="color: cyan">
                    <a href="{{ route('posts.show', $grid[$i]->id) }}" title="">
                        <h3>{{$grid[$i]->title}}</h3>
                    </a>
                    <div class=textBorder>
                        <p>{{$grid[$i]->shortText}}
                        </p>
                        @if($grid[$i]->image != '*')
                            <img src="{{$grid[$i]->image}}" alt="img" style="width: 100%">
                        @endif
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(Illuminate\Support\Facades\Auth::user()->name == 'admin')
                            <a href="{{ route('post.delete', $grid[$i]->id) }}">Zmazať</a>
                        @endif
                    @endif
                    <div style="height: 2vw"></div>
                </div>
            @endfor
        </div>
    </div>
@endsection
