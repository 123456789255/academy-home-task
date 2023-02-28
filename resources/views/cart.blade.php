@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Корзина</h1>
        <table class="w-100">
            <thead class="w-100">
                <tr class="d-flex justify-content-between w-100">
                    <th class="w-33 text-start">Фото</th>
                    <th class="w-33 text-center">Название</th>
                    <th class="w-33 text-center">Колличество</th>
                    <th class="w-33 text-end">Цена</th>
                    <th class="w-33 text-end"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr class="d-flex justify-content-between w-100 mb-3">
                        <td class="w-33 d-flex justify-content-start align-center"><img src="/public/img/{{ $cart->Product->photo }}" alt="product-photo" class="cart-img"></td>
                        <td class="w-33 d-flex justify-content-center align-center">{{ $cart->Product->name }}</td>
                        <td class="w-33 d-flex justify-content-center align-center">
                            <a href="/public/remove-from-card/{{ $cart->product_id }}" class="btn btn-primary m-auto">-</a>
                            {{ $cart->quantity }}шт
                            <a href="/public/add-on-cart/{{ $cart->product_id }}" class="btn btn-primary m-auto">+</a>
                        </td>
                        <td class="w-33 d-flex justify-content-end align-center">{{ intval($cart->Product->price)*($cart->quantity) }}&#8381</td>
                        <td class="w-33 d-flex justify-content-end align-center"><a href="/public/remove-all-from-card/{{ $cart -> id }}" class="btn btn-danger">Удалить</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
