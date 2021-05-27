@extends('adminlte::page')

@section('title', 'Категория: ' . $category->name)

@section('content_header', 'Категория: ' . $category->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th style="width:25%">Название:</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('admin.category.edit', ['category' => $category])}}"
               class="btn btn-primary">Редактировать</a>
        </div>
    </div>
@endsection
