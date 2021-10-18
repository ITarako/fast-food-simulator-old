@extends('adminlte::page')

@section('title', 'Продукты')

@section('content_header', 'Продукты')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a href="{{route('admin.product.create')}}" class="btn btn-success">Создать продукт</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if($models->count())
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $id => $model)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$model->name}}</td>
                                <td>

                                    <a href="{{ route('admin.product.show', ['product' => $model]) }}" class="btn btn-info btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.product.edit', ['product' => $model]) }}" class="btn btn-primary btn-sm">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.product.destroy', ['product' => $model]) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $models->links() }}
                    @else
                        Нет данных для вывода
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
