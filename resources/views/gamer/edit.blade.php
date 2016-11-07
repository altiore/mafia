<form action="{{ url('gamer/'.$gamer->id) }}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    <div class="form-group">
        <label for="game-name-edit">Изменить имя?</label>
        <input class="form-control" id="game-name-edit" type="text" value="{{$gamer->name}}">
    </div>

</form>
