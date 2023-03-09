@extends('layouts.app')
@section('content')
    <div class="container catalog">
        <h1>Каталог товаров</h1>

        <div class="filters">
            <form method="get" class="filter__form">
                <select name="category">
                    <option value="">Все категории</option>
                    <option value="1">Лазерные принтеры</option>
                    <option value="2">Струйные принтеры</option>
                    <option value="3">Термопринтеры</option>
                </select>

                <select name="sort_by">
                    <option value="created_at">По новизне</option>
                    <option value="price">По цене</option>
                    <option value="year">По году выпуска</option>
                    <option value="name">По наименованию</option>
                </select>

                <select name="sort_order">
                    <option value="desc">По убыванию</option>
                    <option value="asc">По возрастанию</option>
                </select>

                <button type="submit" class="btn btn-primary">Применить</button>
            </form>
        </div>

        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    <a href="{{ route('product', $product->id) }}" class="text-black none-underline product_link">
                        <img src="/public/img/{{ $product->image }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">{{ $product->price }} руб.</p>
                        <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST" class="w-100">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Добавить в корзину</button>
                        </form>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
