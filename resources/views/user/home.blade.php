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
  <div class="text-center">  
            <h2 class="fw-bold">Shop Now</h2>
        </div>
    <div class="card-group ">
        
        @foreach ($products as $product)
            <div class="">
                <div class="mt-3 mr-2" style="width: 14.34rem">
                    <div class="card">
                        <img src="{{ asset('products/') . '/' . $product->image }}" class="card-img-top"
                            style="width: 14.34rem" >
                        <div class="card-body">
                            <h5 class="card-title" >
                                <a href="{{ url("user/product/view/$product->id")}}" style="color: #E8B4B8;">  {{ $product->name }}</a>
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
