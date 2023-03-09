@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Товары</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <form action="{{ route('admin.addProduct') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Наименование товара</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="description">Описание товара</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Цена товара</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category">
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name_category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Колличество товара на складе</label>
                    <input type="quantity" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}"
                        required>
                    </select>
                </div>

                <div class="form-group">
                    <label for="model">Год модели</label>
                    <input type="number" name="model" id="model" class="form-control" value="{{ old('model') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="year">Год производства</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="image">Изображение товара</label>
                    <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success mt-4">Добавить товар</button>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>№</th>
                <th>Изображение товара</th>
                <th>Наименование товара</th>
                <th>Описание товара</th>
                <th>Цена товара</th>
                <th>Категория</th>
                <th>Колличество товара на складе</th>
                <th>Год модели</th>
                <th>Год производства</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="/public/img/{{ $product->image }}" alt="" class="w-100"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }} руб.</td>
                    <td>@foreach ($category as $cat)
                        {{ $product->category === $cat->name_category }}
                    @endforeach</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->model }}</td>
                    <td>{{ $product->year }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                            <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-primary ms-2">Редактировать</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
