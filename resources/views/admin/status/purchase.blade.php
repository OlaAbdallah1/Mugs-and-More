@extends('layouts.admin')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Area</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Shipping cost</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Purchased Date</th>
                <th scope="col"></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($purchases as $purchase)
            <tr >
                <td>  <p class="mt-3" style="font-weight: 900"> . </p> </td>
                <td>
                    @if ($purchase->area == 20)
                        <p class="mt-3">West Bank </p>
                   @elseif ($purchase->area == 30)
                    <p class="mt-3">Jerusalem </p>
                @elseif  ($purchase->area == 50)
                    <p class="mt-3">48 Land </p>
                @endif

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
                        <a href="{{ url('/user/purchased-orders/') }}" class="btn mt-2" style="color: #E8B4B8;">View details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection