@extends('admin.layout.master')

@section('top_content')
@include('admin.layout._partials.breadcrumbs', [
            'title' => 'Создание продукта',
            'items' => [
                    [ 'title' => 'Начало работы', 'action' => 'Admin\DashboardController@index', 'active' => FALSE ],
                    [ 'title' => 'Секция "Продукция"', 'action' => 'Admin\ProductsController@index', 'active' => FALSE ],
                    [ 'title' => 'Создание продукта', 'action' => '', 'active' => TRUE ],
            ]
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Заполните, пожалуйста, поля ниже</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        @include('admin.products._partials.form')
    </div><!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ route('admin.sections.products.index') }}">Назад ко всем продуктам</a>
    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop

@section('script')
    <script src="{{ asset('adminlte/dist/js/product_heights.js') }}"></script>
@stop