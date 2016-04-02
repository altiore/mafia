@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            @if ($gameExists)
                <div class="col-sm-12 alert alert-success">
                    {{$test}}
                </div>

                @if (count($gamers) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Current Tasks
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>Участники:</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($gamers as $gamer)
                                    <tr>
                                        <td class="table-text">
                                            <div><span>{{ $gamer->id }}</span> {{ $gamer->name }}</div>
                                        </td>

                                        <td>
                                            <form action="{{ url('gamer/'.$gamer->id) }}" method="POST">
                                                {!! csrf_field() !!}

                                                <button type="submit" id="delete-task-{{ $gamer->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ url('gamer/'.$gamer->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}

                                                <button type="submit" id="delete-task-{{ $gamer->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif


                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <!--@include('common.errors')-->

                    <form action="{{ url('gamer') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Введите имя</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="gamer-name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Добавить игрока
                                </button>
                            </div>
                        </div>
                    </form>
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
