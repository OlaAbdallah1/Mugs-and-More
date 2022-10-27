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
                <th scope="col">Order Date</th>
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
            @foreach ($orders as $order)
                <tr>
                    <th scope="row"><img src="{{ asset('products/') . '/' . $order->image }}"
                            style="width: 50px; height: 50px;"></th>
                    <td>
                        <p class="mt-3">{{ $order->product_name }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->quantity }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->price }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->total }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->created_at }}</p>
                    </td>
                    <td>
                        <form method="post" action="{{ url("user/order/delete/$order->id") }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn mt-2"> <i class="fa-sharp fa-solid fa-trash"></i>
                                </i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="container mx-3">
        <p class="">
            <span class="lead fw-normal">Total: {{ $orders->sum('total') }} ₪ </span>
        </p>

        <form method="post" action="{{ url('/user/purchase') }}">
            @csrf
            @method('POST')
            <p class="lead fw-normal"> Shipping To
                <select name="area" id="area" class="btn btn-primary mx-3">
                    <option value="20">West Bank</option>
                    <option value="30">Jerusalem</option>
                    <option value="50">48 Land</option>
                </select>
                <button type="button" class="btn" onclick="getShippingCost()"> Calculate Total </button>
            </p>
            <p class="d-flex">
                <label for="location" class="lead fw-normal"> Postal Code </label>
                <input class="lead form-control mx-3 @error('postal_code') is-invalid @enderror" style="width: 15%"
                    name="postal_code" placeholder="City, Village, St" type="text"> </input>

                <a class="mt-2" href="https://postcode.palestine.ps/" target="_blank" style="color: #67595E">Get your
                    postal code</a>

                @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>

            <p class="lead fw-normal "> Shipping Cost
                <span class="shipping mx-3">
                </span>
                <input type="hidden" id="shipping_cost" name="shipping_cost"></input>

            </p>


            <p class="lead fw-normal"> Total Cost
                <span class="total mx-3">
                </span>
                <input type="hidden" id="total_cost" name="total_cost"></input>

            </p>
            <p class="lead fw-normal">
            <p class="message" name="message" id="message" style="color: #E8B4B8; font-weight: bold"></p>
            </p>
            <p class="">
            <p class="mb-0" style="color: #E8B4B8; font-weight: bold"> Payment when recieving </p>
            <button type="submit" class="btn btn-primary mb-4">Purchase Now</button>
            
            </p>
        </form>
    </div>
    {{-- For add Shipping costs --}}

    <script type="text/javascript">
        function getShippingCost() {
            selectElement = document.querySelector('#area');
            shipping = selectElement.value + ' ₪';
            total = Number.parseInt(selectElement.value) + {{ $orders->sum('total') }};
            document.querySelector('.shipping').textContent = shipping;
            document.querySelector('.total').textContent = total;
            if (Number.parseInt(selectElement.value) == 20) {
                document.querySelector('.message').textContent = "Delivery will take 2-5 days";
            }
            if (Number.parseInt(selectElement.value) == 40) {
                document.querySelector('.message').textContent = "Delivery will take 7-10 days";
            }
            if (Number.parseInt(selectElement.value) == 70) {
                document.querySelector('.message').textContent = "Delivery will take 10-15 days";
            }

            document.getElementById("shipping_cost").setAttribute('value', selectElement.value);
            document.getElementById("total_cost").setAttribute('value', total);

        }
    </script>
@endsection
