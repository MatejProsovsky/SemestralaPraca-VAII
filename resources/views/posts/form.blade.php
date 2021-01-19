<form method="post" action="{{ $action }} ">
    @csrf
    @method($method)
    <div class="form-group" style="margin-left: 5%; margin-right: 5%;margin-top: 2%;margin-bottom: 3%">

        <label>Názov</label>
        <input name="title" type="text" class="form-control" value="{{ $model->title }}" required style="margin-bottom: 1%">

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

        <label>Úvodný text</label>
        <textarea name="shortText" type="text" class="form-control"  required style="margin-bottom: 1%">{{ $model->shortText }}</textarea>

        <label>Text</label>
        <textarea name="Text" type="text" class="form-control" required style="margin-bottom: 1%; height: 100px">{{ $model->text }}</textarea>

        <div class="col-md-8 offset-md-4">
            <button type= "submit" class="btn btn-primary" style="width: 40%">Zmeniť</button>
        </div>

    </div>

</form>
