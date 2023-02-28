@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $product->name }}</h1>
                <img src="/public/img/{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail">
                <p>Цена: {{ $product->price }} руб.</p>
                <p>Страна-производитель: {{ $product->country }}</p>
                <p>Год выпуска: {{ $product->year }}</p>
                <p>Модель: {{ $product->model }}</p>
                <p>{{ $product->description }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                  </form>

            </div>
        </div>
    </div>
@endsection