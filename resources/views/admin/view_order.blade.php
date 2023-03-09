@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Заказ #{{ $order->id }}</h1>
        <p>Дата заказа: {{ $order->created_at }}</p>
        <p>Статус: @if ($order->status == 'Подтвержден')
                <a class="btn btn-success m-auto">{{ $order->status }}</a>
            @elseif($order->status == 'Отменен')
                <a class="btn btn-danger m-auto">{{ $order->status }}</a>
            @elseif($order->status !== 'Отменен' && $order->status !== 'Подтвержден')
                <a class="btn btn-primary m-auto">Новый</a>
            @endif
        </p>
        <p>ФИО заказчика: <strong>{{ $order->user->surname }} {{ $order->user->name }}
                {{ $order->user->patronymic }}</strong></p>
        <h2>Товары:</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price }} руб.</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($order->status == 'Новый')
            <div class="d-flex">
                <form method="POST" action="{{ route('admin.cancelOrder', $order->id) }}" class="ms-0">
                    @csrf
                    <button type="submit" class="btn btn-danger">Отменить</button>
                </form>
                <form method="POST" action="{{ route('admin.confirmOrder', $order->id) }}" class="ms-5">
                    @csrf
                    <button type="submit" class="btn btn-success">Подтвердить</button>
                </form>
            </div>
        @endif
    </div>
@endsection
