<!DOCTYPE html>
@extends('layouts.app')


@section('content')
<div class="card mb-3" style="width: 60%; margin-left: 20%">
    <div class="card-header">
        <h2 style="margin-left: 2%; margin-bottom: 0">Upraviť profil</h2>
    </div>
    <form method="post" action="{{route('user.updateProfile') }} ">
        @csrf
        <div class="form-group" style="margin-left: 5%; margin-right: 5%;margin-top: 2%;margin-bottom: 3%">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <label>Meno</label>
            <input name="name" type="text" class="form-control" value="{{$user->name}}" required style="margin-bottom: 1%">

            <label>E-mail</label>
            <input name="email" type="email" class="form-control" value="{{$user->email}}" required style="margin-bottom: 1%">



                <div class="col-md-8 offset-md-4">
                    <button type= "submit" class="btn btn-primary" style="width: 40%">Zmeniť</button>
                </div>

        </div>

    </form>

</div>

@endsection
