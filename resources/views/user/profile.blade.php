@extends('layouts.app')

@section('content')

    <div class="box">
        <form method="POST" action="#">
            <div class="prof" >
                <label for="email">{{$user->name}}</label>
            </div>

            <div class="prof">
                <label for="email">{{$user->email}}</label>
            </div>

            <div class="input-container" style="left: -3.8vw " >
                <a class="btnMine" style = "text-align: center; border: 1px solid cyan " href="{{ route('user.editProfile') }}">
                    {{ __('Zmeniť údaje') }}
                </a>
            </div>

            <div class="input-container" style="left: -4vw">
                @if (Route::has('password.request'))
                    <a class="btnMine" style = "text-align: center; border: 1px solid cyan " href="{{ route('password.request') }}">
                        {{ __('Zmeniť heslo?') }}
                    </a>
                @endif
            </div>

        </form>
    </div>

@endsection
