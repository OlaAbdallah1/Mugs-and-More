@extends('layouts.admin')
@section('content')

<span style="font-weight: 900; font-size: 2em">All Orders</span> 

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
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

                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="container mx-3 row">
        <p class="">
            <span class="lead fw-normal">Total: {{ $purchased_orders->sum('total') }} ₪ </span>
        </p>

        <form method="post" action="{{ url("admin/order/out/$purchased_operation->id") }}">
            @csrf
            @method('PUT')
            @if ($purchased_operation->status == '0' )
                <button type="submit" style="height: 35px" class="btn btn-primary mt-5"> <i
                        class="fas fa-light fa-outdent"></i>Mark Order as Out</button>
            @elseif($purchased_operation->status == '1')
                <button type="submit" style="height: 35px" class="btn btn-primary mt-5" disabled> <i
                        class="fas fa-light fa-outdent"></i>Mark Order as Out</button>
                        <div>Order Out</div>

            @elseif ($purchased_operation->status == '2')
            <button type="submit" style="height: 35px" class="btn btn-primary mt-5" disabled> <i
                class="fas fa-light fa-outdent"></i>Mark Order as Out</button>
            @endif
        </form>


        <form method="post" action="{{ url("admin/order/delivered/$purchased_operation->id") }}" class="mx-3">
            @csrf
            @method('PUT')
            @if ($purchased_operation->status == '0' || $purchased_operation->status == '1')
                <button type="submit" style="height: 35px" class="btn btn-primary mt-5"><i
                        class="fas fa-circle-check"></i>Mark Order as Delivered</button>
            @else
                <button type="submit" style="height: 35px" class="btn btn-primary mt-5" disabled><i
                        class="fas fa-circle-check"></i>Mark Order as Delivered</button>
                        <div>Order Dilivered</div>
            @endif
        </form>
    </div>
@endsection
