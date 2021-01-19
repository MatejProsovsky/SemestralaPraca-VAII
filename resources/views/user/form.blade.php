<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ 'neplatne zadane udaje' }}<br>
    @endforeach
</div>

<form method="post" action="{{ $action }} ">
    @csrf
    @method($method)
    <div class="form-group" style="margin-left: 5%; margin-right: 5%;margin-top: 2%;margin-bottom: 3%">

        <label>Meno</label>
        <input name="name" type="text" class="form-control" value="{{ $model->name }}" required style="margin-bottom: 1%">

        <label>E-mail</label>
        <input name="email" type="email" class="form-control" value="{{ $model->email }}" required style="margin-bottom: 1%">


        <div class="col-md-8 offset-md-4">
            <button type= "submit" class="btn btn-primary" style="width: 40%">Zmeniť</button>
        </div>

    </div>

</form>
