@extends('adminlte::page')

@section('title', 'Продукт: ' . $product->name)

@section('content_header', 'Продукт: ' . $product->name)

@section('content')
    <div class="card">
        <form action="<?= route('admin.product.update', ['product' => $product]) ?>" method="POST">
            @csrf
            @method('PUT')
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
                                value="{{old('name', $product->name)}}"
                            >
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
