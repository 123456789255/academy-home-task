@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Список категорий</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name_category }}</td>
                        <td>
                            <a href="{{ route('admin.editCategories', ['id' => $category->id]) }}"
                                class="btn btn-primary">Изменить</a>
                            <form action="{{ route('admin.deleteCategories', ['id' => $category->id]) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Добавить Категорию</h2>
        <form action="{{ route('admin.addCategory') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Название категории:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
