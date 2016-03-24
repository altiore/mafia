@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            @if ($gameExists)
                <div class="col-sm-12 alert alert-success">
                    {{$test}}
                </div>
                <a href="{{ url('/delete') }}" class="btn btn-lg">Удалить игру</a>
            @else
                <form role="form" method="POST" action="{{ url('/create') }}">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-sm-12 control-label alert alert-info">Введите имя игры</label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" value="Создать игру" class="btn btn-lg">
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
