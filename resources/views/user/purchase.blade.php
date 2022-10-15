@extends('layouts.user')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Area</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Shipping cost</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Purchased Date</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($purchases as $purchase)
            <tr >
                    <td>
                        <p class="mt-3">{{ $purchase->area }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchase->postal_code }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchase->shipping_cost }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchase->total_cost }} </p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $purchase->created_at }}</p>
                    </td>
                    <td>
                        <a href="" class="btn mt-2" style="color: #E8B4B8;">View details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection