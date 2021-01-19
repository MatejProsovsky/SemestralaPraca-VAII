@extends('layouts.app')

@section('content')
    <div class="card mb-3" style="width: 60%; margin-left: 20%">
        <div class="card-header">
            <h2 style="margin-left: 2%; margin-bottom: 0">Pridať článok</h2>
        </div>
        <form action="{{route('posts.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group" style="margin-left: 5%; margin-right: 5%;margin-top: 2%;margin-bottom: 3%">
                <label for="text" class="col-md-4 col-form-label">Komentár</label>
                <textarea class="form-control" id="text" name="text" style="resize: none; height: 150px"></textarea>
            </div>
            <div class="col-md-8 offset-md-4">
                <button class="btn btn-primary" style="width: 40%">Odoslať</button>
            </div>

        </form>
    </div>
@endsection
