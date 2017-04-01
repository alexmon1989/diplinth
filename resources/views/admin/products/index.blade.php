@extends('admin.layout.master')

@section('top_content')
@include('admin.layout._partials.breadcrumbs', [
            'title' => 'Секция "Продукция"',
            'items' => [
                    [ 'title' => 'Начало работы', 'action' => 'Admin\DashboardController@index', 'active' => FALSE ],
                    [ 'title' => 'Секция "Продукция"', 'action' => '', 'active' => TRUE ],
            ]
        ])
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Список продуктов</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <p>
            <a class="btn btn-primary" href="{{ route('admin.sections.products.create') }}"><i class="fa fa-plus"></i> Создать</a>
        </p>

        <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Включено</th>
                    <th>В наличии</th>
                    <th>Новинка</th>
                    <th>Создано</th>
                    <th>Последнее редактирование</th>
                    <th>Действия</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{!! $product->enabled == true ? '<strong>Да</strong>' : 'Нет' !!}</td>
                    <td>{!! $product->in_stock == true ? '<strong>Да</strong>' : 'Нет' !!}</td>
                    <td>{!! $product->is_new == true ? '<strong>Да</strong>' : 'Нет' !!}</td>
                    <td>{{ date('d.m.Y H:i:s', strtotime($product->created_at)) }}</td>
                    <td>{{ date('d.m.Y H:i:s', strtotime($product->updated_at)) }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.sections.products.edit', compact('product')) }}" title="Редактировать"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm item-delete" href="{{ route('admin.sections.products.delete', compact('product')) }}" title="Удалить"><i class="fa fa-remove"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div><!-- /.box -->
@stop