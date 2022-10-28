@extends('layouts.user')

@section('content')
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

    @include('user.slider')
    <div class="section">
        <div class="text-center">
            <h2 class="fw-bold">Recently Added</h2>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card-group ">

                        @foreach ($recent_products as $recent_product)
                            <div class="mt-3 mr-2" style="width: 14.34rem">
                                <div class="card">
                                    <img src="{{ asset('products/') . '/' . $recent_product->image }}" class="card-img-top"
                                        style="width: 14.34rem">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ url("user/product/view/$recent_product->id") }}" style="color: #E8B4B8;">
                                            {{ $recent_product->name }}</a>
                                    </h5>
        
                                    <p class="mb-2"> {{ $recent_product->price }} ₪ </p>
                                </div>        
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="card-group ">

                        @foreach ($recent_products1 as $recent_product1)
                            <div class="mt-3 mr-2" style="width: 14.34rem">
                                <div class="card">
                                    <img src="{{ asset('products/') . '/' . $recent_product1->image }}" class="card-img-top"
                                        style="width: 14.34rem">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ url("user/product/view/$recent_product1->id") }}" style="color: #E8B4B8;">
                                            {{ $recent_product1->name }}</a>
                                    </h5>
        
                                    <p class="mb-2"> {{ $recent_product1->price }} ₪ </p>
                                </div>  
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="card-group ">

                        @foreach ($recent_products2 as $recent_product2)
                            <div class="mt-3 mr-2" style="width: 14.34rem">
                                <div class="card">
                                    <img src="{{ asset('products/') . '/' . $recent_product2->image }}" class="card-img-top"
                                        style="width: 14.34rem">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ url("user/product/view/$recent_product2->id") }}" style="color: #E8B4B8;">
                                            {{ $recent_product2->name }}</a>
                                    </h5>
        
                                    <p class="mb-2"> {{ $recent_product2->price }} ₪ </p>
                                </div>  
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="text-center mt-3">
        <h2 class="fw-bold">Shop Now</h2>
    </div>
    <div class="card-group ">

        @foreach ($products as $product)
            <div class="">
                <div class="mt-3 mr-2" style="width: 14.34rem">
                    <div class="card">
                        <img src="{{ asset('products/') . '/' . $product->image }}" class="card-img-top"
                            style="width: 14.34rem">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ url("user/product/view/$product->id") }}" style="color: #E8B4B8;">
                                    {{ $product->name }}</a>
                            </h5>

                            <p class="mb-2"> {{ $product->price }} ₪ </p>
                            @if ($product->quantity == 0)
                                <span class="mb-2">Sold Out</span>
                            @else
                                <span class="mb-2">{{ $product->quantity }} pieces</span>
                            @endif

                            <div class="d-flex">
                                <form method="post" action="{{ url("user/product/add/order/$product->id") }}">
                                    @csrf
                                    @if ($product->quantity == 0)
                                        <input type="number" value="0" class="form-control" name="quantity"
                                            style="width: 50px" disabled>
                                        <button type="submit" class="btn btn-primary mt-2" disabled><i
                                                class="fa-sharp fa-solid fa-cart-plus"></i>
                                        </button>
                                    @else
                                        <input type="number" value="1" min="1" max="{{ $product->quantity }}"
                                            class="form-control" name="quantity" style="width: 50px">
                                        <button type="submit" class="btn btn-primary m-2"><i
                                                class="fa-sharp fa-solid fa-cart-plus"></i>
                                        </button>
                                    @endif

                                </form>
                                <form method="post" action="{{ url("user/product/add/wishlist/$product->id") }}">
                                    @csrf
                                    <button type="submit" style="height: 35px" class="btn btn-primary mt-5"><i
                                            class="fa-solid fa-heart-circle-plus"></i></button>
                                </form>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
