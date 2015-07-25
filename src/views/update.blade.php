@extends('prodCatViews::layouts.main')

@section('title') Измениe товара {{ $product->art . ' - ' . $product->name  }} @endsection

@section('content')

    <h3>Измениe товара {{ $product->art . ' - ' . $product->name  }}</h3>

    <form id="updateProductForm" method="post" action="{{ url('/products/'.$product->id) }}">
        <a href="{{ url('/products') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Назад
        </a>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Сохранить
        </button>
        <hr/>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">

        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="form-group">
            <label for="art">Артикль:</label>
            <input class="form-control" @if(app('current_user_type') === 'manager') readonly="readonly" @endif type="text" name="art" id="art" value="{{ $product->art }}">
            {!! $errors->first('art', '<p>:message</p>') !!}
        </div>

        <div class="form-group">
            <label for="name">Наименование:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
            {!! $errors->first('name', '<p>:message</p>') !!}
        </div>
    </form>

@stop