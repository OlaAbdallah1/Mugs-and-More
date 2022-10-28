@extends('layouts.user')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if (Session::has('warning'))
                <div class="alert alert-danger">
                    {{ Session::get('warning') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @foreach ($purchased_orders as $purchased_order)
                <tr>
                    <th scope="row"><img src="{{ asset('products') . '/' . $purchased_order->image }}"
                            style="width: 70px; height: 70px;"></th>
                    <td>
                        <p class="mt-3">{{ $purchased_order->name }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchased_order->quantity }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchased_order->price }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchased_order->total }} ₪</p>
                    </td>
                    
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="container mx-3">
        <p class="">
            <span class="lead fw-normal">Total: {{ $purchased_orders->sum('total') }} ₪ </span>
        </p>
        </div>
    
@endsection
