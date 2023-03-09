@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Редактировать Категорию</h1>

        <form method="post" action="{{ route('admin.updateCategories', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Название категории</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name_category }}">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
