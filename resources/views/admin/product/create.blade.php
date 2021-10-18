@extends('adminlte::page')

@section('title', 'Создание продукта')

@section('content_header', 'Создание продукта')

@section('content')
    <div class="card">
        <form action="<?= route('admin.product.store') ?>" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input
                                id="name"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Введите название"
                                autocomplete="off"
                                value="{{old('name')}}"
                            >
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Название</label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Введите описание"
                                autocomplete="off"
                            >{{old('description')}}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input
                                id="price"
                                name="price"
                                class="form-control @error('price') is-invalid @enderror"
                                placeholder="Введите цену"
                                autocomplete="off"
                                value="{{old('price')}}"
                            >
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select
                                id="category_id"
                                name="category_id"
                                class="form-control @error('category_id') is-invalid @enderror"
                            >
                                @foreach($categories as $id => $name)
                                    <option value="{{$id}}"{{$id === old('category_id') ? ' selected' : ''}}>{{$name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
