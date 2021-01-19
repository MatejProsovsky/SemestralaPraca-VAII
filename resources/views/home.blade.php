@extends('layouts.app')

@section('content')
<div class=box style="color: #c5c6c7">
    @if (session('status'))
        <div style="color: #c5c6c7" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{ __('Ste prihlásený!') }}
</div>
@endsection
