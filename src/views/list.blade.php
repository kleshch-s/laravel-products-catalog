@extends('prodCatViews::layouts.main')

@section('title') Список товаров @endsection

@section('content')
    <a href="{{ url('/products/create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i> Создать новый товар
    </a>
    <hr/>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th class="col-xs-2">Id</th>
            <th class="col-xs-4">Артикул</th>
            <th class="col-xs-4">Наименование</th>
            <th class="col-xs-2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) == 0)
            <tr>
                <td colspan="4" class="text-center">Нет товаров</td>
            </tr>
        @else
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->art}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ url('/products/'.$product->id).'/edit' }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form class="deleteProductForm" action="{{ url('/products/'.$product->id) }}" method="post" style="display: inline-block;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-times-circle-o"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <script>
        window.onload = function(){
            var deleteForms = document.querySelectorAll('.deleteProductForm');

            for(var i = 0; i < deleteForms.length; i++){
                deleteForms[i].addEventListener('click', function(e) {
                    if(!confirm('Вы действительно хотите удалить запись о товаре?')){
                        e.preventDefault();
                        return false;
                    }
                }, false);
            }
        };
    </script>
@stop