@extends('prodCatViews::layouts.main')

@section('title') Создать новый товар @endsection

@section('content')

    <h3>Создать новый товар</h3>

    <form method="post" action="{{ url('/products') }}">
        <a href="{{ url('/products') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Назад
        </a>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Сохранить
        </button>
        <hr/>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="art">Артикль:</label>
            <input class="form-control" type="text" name="art" id="art" value="{{ Request::old('art') }}">
            {!! $errors->first('art', '<p>:message</p>') !!}
        </div>

        <div class="form-group">
            <label for="name">Наименование:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}">
            {!! $errors->first('name', '<p>:message</p>') !!}
        </div>
    </form>

@stop