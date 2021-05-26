@extends('adminlte::page')

@section('title', 'Создание категории')

@section('content_header', 'Создание категории')

@section('content')
    <div class="card">
        <form action="<?= route('admin.category.store') ?>" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                placeholder="Введите название"
                                autocomplete="off"
                                value="{{old('name')}}"
                            >
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
@endsection
