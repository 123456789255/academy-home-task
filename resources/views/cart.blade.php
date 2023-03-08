@extends('layouts.app')

@section('content')
    <div class="container  ">
        <div class="card-header">
            <h1>Корзина</h1>
        </div>
        @if ($carts->isEmpty())
            <div class="alert alert-info" role="alert">
                Корзина пуста.
            </div>
        @else
            <table class="w-100">
                <thead class="w-100">
                    <tr class="d-flex justify-content-between w-100 cart__tr_head">
                        <th class="w-33 text-start">Фото</th>
                        <th class="w-33 text-center">Название</th>
                        <th class="w-33 text-center">Колличество</th>
                        <th class="w-33 text-end">Цена</th>
                        <th class="w-33 text-end"></th>
                    </tr>
                </thead>
                <tbody class="mobile-dnone flex-column">
                    @foreach ($carts as $cart)
                        <tr class="d-flex justify-content-between w-100 mb-3 cart__tr_body">
                            <td class="w-33 d-flex justify-content-start align-center"><img
                                    src="/public/img/{{ $cart->product->image }}" alt="product-photo" class="cart-img">
                            </td>
                            <td class="w-33 d-flex justify-content-center align-center">
                                <strong>{{ $cart->Product->name }}</strong>
                            </td>
                            <td class="w-33 d-flex justify-content-center align-center">
                                <a href="/public/remove-from-card/{{ $cart->product_id }}"
                                    class="btn btn-primary m-auto">-</a>
                                {{ $cart->quantity }}шт
                                <a href="/public/add-on-cart/{{ $cart->product_id }}" class="btn btn-primary m-auto">+</a>
                            </td>
                            <td class="w-33 d-flex justify-content-end align-center">
                                {{ intval($cart->Product->price) * $cart->quantity }}руб.</td>
                            <td class="w-33 d-flex justify-content-end align-center"><a
                                    href="{{ route('cart.remove.all', ['cartId' => $cart->id]) }}"
                                    class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="desktop-dnone flex-column">
                    @foreach ($carts as $cart)
                        <tr class="d-flex justify-content-between w-100 mb-3 cart__tr_body">
                            <td class="w-50 d-flex justify-content-start align-center"><img
                                    src="/public/img/{{ $cart->product->image }}" alt="product-photo" class="cart-img">
                            </td>
                            <td class="w-33 d-flex justify-content-start align-center w-100 ps-4">
                                <div class="w-100">
                                    <p><strong>{{ $cart->product->name }}</strong></p>
                                    <div class="d-flex mb-3 justify-content-start w-70">
                                        <a href="/public/remove-from-card/{{ $cart->product_id }}"
                                            class="btn btn-primary">-</a>
                                        <p class="m-auto">{{ $cart->quantity }}шт.</p>
                                        <a href="/public/add-on-cart/{{ $cart->product_id }}" class="btn btn-primary">+</a>
                                    </div>
                                    <p class="m-auto">{{ intval($cart->Product->price) * $cart->quantity }}руб.</p>
                                </div>
                            </td>
                            <td class="w-33 d-flex justify-content-end align-center"><a
                                    href="{{ route('cart.remove.all', ['cartId' => $cart->id]) }}"
                                    class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="d-flex justify-content-between w-100 cart__tr_foot">
                        <td colspan="3">Общая стоимость:</td>
                        <td><strong>{{ $carts->sum(function ($cart) {return $cart->product->price * $cart->quantity;}) }}
                                руб.</strong></td>
                    </tr>
                </tfoot>
            </table>
            {{-- <a href="mailto: kazah.zanat@gmail.com?subject=Заказ на CopyStar.ру&body=Здравствуйте, я бы хотел(а) заказать у вас {{$cart->product->name}} {{$cart->quantity}}шт. За {{ $carts->sum(function ($cart) {return $cart->product->price * $cart->quantity;}) }}руб." class="btn btn-primary">Сформировать заказ</a> --}}
            <div>
                <p class="m-0">Для того чтобы оформить заказ введите пароль:</p>
                <form action="{{ route('orders.store') }}" method="POST" class="">
                    @csrf
                    <div class="form-group">
                        <input id="password" type="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Сформировать заказ</button>
                </form>
            </div>
        @endif
    </div>
@endsection
