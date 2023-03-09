@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        <form action="{{ route('admin.orders') }}" method="GET">
                            <div class="form-group">
                                <label for="status">Статус:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value=""
                                        {{ $status !== 'Новый' && $status !== 'Подтвержден' && $status === 'Отменен' ? 'selected' : '' }}>
                                        Все</option>
                                    <option value="Новый" {{ $status === 'Новый' ? 'selected' : '' }}>Новый</option>
                                    <option value="Подтвержден" {{ $status === 'Подтвержден' ? 'selected' : '' }}>
                                        Подтвержденный</option>
                                    <option value="Отменен" {{ $status === 'Отменен' ? 'selected' : '' }}>Отмененный
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Фильтр</button>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">№</th>
                                    <th class="text-center">ФИО</th>
                                    <th class="text-center">Предметы</th>
                                    <th class="text-center">Сумма</th>
                                    <th class="text-center">Статус</th>
                                    <th class="text-center">Заказ создан</th>
                                    <th class="text-center">Подтвердить\Отклонить</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->surname }}<br>{{ $order->user->name }}<br>{{ $order->user->patronymic }}
                                        </td>
                                        <td>
                                            @foreach ($order->items as $item)
                                                {{ $item->product->name }} x {{ $item->quantity }}<br>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $order->items->sum(function ($cart) {return $cart->product->price * $cart->quantity;}) }}
                                            руб.</td>
                                        <td class="">
                                            @if ($order->status == 'Подтвержден')
                                                <div class="d-flex">
                                                    <a class="btn btn-success m-auto">{{ $order->status }}</a>
                                                </div>
                                            @elseif($order->status == 'Отменен')
                                                <div class="d-flex">
                                                    <a class="btn btn-danger m-auto">{{ $order->status }}</a>
                                                </div>
                                            @elseif($order->status !== 'Отменен' && $order->status !== 'Подтвержден')
                                                <div class="d-flex">
                                                    <a class="btn btn-primary m-auto">Новый</a>
                                                </div>
                                            @endif
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                            <a href="{{ route('admin.viewOrder', $order->id) }}"
                                                class="w-82 ms-auto me-auto btn btn-primary mb-1">Подробнее</a></div>
                                            @if ($order->status == 'Новый')
                                                <div class="d-flex">
                                                    <form method="POST"
                                                        action="{{ route('admin.cancelOrder', $order->id) }}"
                                                        class="m-auto">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Отменить</button>
                                                    </form>
                                                    <form method="POST"
                                                        action="{{ route('admin.confirmOrder', $order->id) }}"
                                                        class="m-auto">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Подтвердить</button>
                                                    </form>
                                                </div>
                                            @elseif ($order->status == 'Подтвержден')
                                                <div class="d-flex"><a
                                                        class="btn btn-success m-auto">{{ $order->status }}</a></div>
                                            @elseif($order->status == 'Отменен')
                                                <div class="d-flex"><a
                                                        class="btn btn-danger m-auto">{{ $order->status }}</a></div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
