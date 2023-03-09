@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.orders') }}" class="btn btn-success m-auto">Просмотр и редактирование заказов</a>
            <a href="{{ route('admin.products') }}" class="btn btn-primary m-auto">Добавление и редактирование товаров в каталоге</a>
            <a href="" class="btn btn-danger m-auto">Добавление и удаление категорий</a>
        </div>
    </div>
@endsection
