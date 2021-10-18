@extends('adminlte::page')

@section('title', 'Продукт: ' . $product->name)

@section('content_header', 'Продукт: ' . $product->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th style="width:25%">Название:</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.product.edit', ['product' => $product])}}"
               class="btn btn-primary">Редактировать</a>
        </div>
    </div>
@endsection
