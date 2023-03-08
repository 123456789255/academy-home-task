@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Заказы</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Дата</th>
                    <th>Заказчик</th>
                    <th>Телефон</th>
                    <th>Адрес</th>
                    <th>Количество товаров</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->items->sum('quantity') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($order->status == 'Новый')
                                    <form action="{{ route('admin.orders.update', ['order' => $order]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Нет заказов</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
