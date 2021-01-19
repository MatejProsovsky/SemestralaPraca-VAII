@extends('layouts.app')

@section('content')
    <div class="card mb-3" style="width: 60%; margin-left: 20%">
        <div class="card-header">
            <h2 style="margin-left: 2%; margin-bottom: 0">Pridať článok</h2>
        </div>
        <form action="{{route('posts.store') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-group" style="margin-left: 5%; margin-right: 5%;margin-top: 2%;margin-bottom: 3%">
                <label for="title" class="col-md-4 col-form-label">Názov</label>

                <input id="title"
                       type="text"
                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                       name="title"
                       value="{{ old('title') }}"
                       autocomplete="title" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                @endif
                <div class="form-group">
                    <label for="sel1">Vyber sekciu:</label>
                    <select class="form-control" id="section" name="section">
                        <option>CPU alebo MB</option>
                        <option>GPU</option>
                        <option>PAMATE</option>
                        <option>SMARTPHÓNY</option>
                        <option>NOTEBOOKY</option>
                        <option>OSTATNÉ</option>
                    </select>
                </div>

                <label for="image" class="col-md-4 col-form-label">Adresa pre obrázok</label>
                <input id="image"
                       type="text"
                       class="form-control"
                       name="image"
                       autocomplete="title" autofocus>

                <label for="text" class="col-md-4 col-form-label">Úvodný text</label>
                <textarea class="form-control" id="shortText" name="shortText" style="resize: none; height: 50px"></textarea>


                <label for="text" class="col-md-4 col-form-label">Text</label>
                <textarea class="form-control" id="text" name="text" style="resize: none; height: 200px"></textarea>

                <label for="image" class="col-md-4 col-form-label">Zdroj</label>
                <input id="source"
                       type="text"
                       class="form-control"
                       name="source"
                       autocomplete="title" autofocus>
            </div>
            <div class="col-md-8 offset-md-4">
                <button class="btn btn-primary" style="width: 40%">Odoslať</button>
            </div>


        </form>
    </div>
@endsection
