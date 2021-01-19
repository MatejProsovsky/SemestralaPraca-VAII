@extends('layouts.app')

@section('content')
<div class="box">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-container">
            <input id="email" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="email" >{{ __('E-Mail') }}</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btnMine" style="left: 0.2vw">
            {{ __('Odoslať mail pre zmenu hesla') }}
        </button>
    </form>
</div>
@endsection
