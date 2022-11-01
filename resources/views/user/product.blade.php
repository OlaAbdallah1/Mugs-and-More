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
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $product->name }}</h3>
                </div>
                <div class="card-body d-flex">
                    <img src="{{ asset('products/') . '/' . $product->image }}" style="height: 25rem ; width: 25rem"
                        alt="">
                    <div class="container mx-5 mt-4">
                        <p class="card-text mb-2" style="color: #E8B4B8; font-weight: bold">
                            {{ $product->description }}</p>
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
                                            class="fa-sharp fa-solid fa-cart-plus"></i>Add to cart
                                    </button>
                                @else
                                    <input type="number" value="1" min="1" max="{{ $product->quantity }}"
                                        class="form-control" name="quantity" style="width: 50px">
                                    <button type="submit" class="btn btn-primary m-2"><i
                                            class="fa-sharp fa-solid fa-cart-plus"></i>Add to cart
                                    </button>
                                @endif

                            </form>
                            <form method="post" action="{{ url("user/product/add/wishlist/$product->id") }}">
                                @csrf
                                <button type="submit" style="height: 35px" class="btn btn-primary mt-5"><i
                                        class="fa-solid fa-heart-circle-plus"></i>Add to wishlist</button>
                            </form>
                        </div>

                        <div class="card-group">
                            @foreach ($details_images as $detail_image)
                                <div class="mt-3 mx-1">
                                    <img src="{{ asset('products/detailsImages/') . '/' . $detail_image->detail_image }}"
                                        style="width:9.5rem">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="section mx-3 w-50">
                    <div class="comment-wrapper">
                        <div class="panel panel-info">
                            <hr>

                            <ul class="media-list">
                                @foreach ($feedbacks as $feedback)
                                    <li class="media">
                                        <div class="media-body">
                                            <span class="text-muted pull-right">
                                                <small class="text-muted">{{ $feedback->created_at }}</small>
                                            </span>
                                            <strong class="text-success">{{ $feedback->name }}</strong>
                                            <p>
                                                {{ $feedback->body }}
                                            </p>
                                            <img class="w-25 mb-3"
                                                src="{{ asset("products/feedbacks/$feedback->image")}}"
                                                alt="">
                                        </div>
                                        <form method="post" action="{{ url("user/feedback/delete/$feedback->id") }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn mt-2"> <i class="fa-sharp fa-solid fa-trash"></i>
                                                </i></button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <div class="panel-body">
                                <form action="{{ url("/user/product/feedback/$product->id") }}" method="POST">
                                    @csrf
                                    <textarea class="form-control" placeholder="Add your Feedback..." rows="3" name="feedback"></textarea>
                                    <br>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                                </form>

                                
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Similar Products</h3>
                </div>
                <div class="card-group ">
                    @foreach ($similar_products as $similar_product)
                        <div class="mt-3 mr-2" style="width: 14rem">
                            <div class="card">
                                <img src="{{ asset('products/') . '/' . $similar_product->image }}" class="card-img-top"
                                    style="width: 14rem">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ url("user/product/view/$similar_product->id") }}"
                                            style="color: #E8B4B8;">
                                            {{ $similar_product->name }}</a>
                                    </h5>

                                    <p class="mb-2"> {{ $similar_product->price }} ₪ </p>
                                    @if ($similar_product->quantity == 0)
                                        <span class="mb-2">Sold Out</span>
                                    @else
                                        <span class="mb-2">{{ $similar_product->quantity }} pieces</span>
                                    @endif

                                    <div class="d-flex">
                                        <form method="post"
                                            action="{{ url("user/product/add/order/$similar_product->id") }}">
                                            @csrf
                                            @if ($similar_product->quantity == 0)
                                                <input type="number" value="0" class="form-control" name="quantity"
                                                    style="width: 50px" disabled>
                                                <button type="submit" class="btn btn-primary mt-2" disabled><i
                                                        class="fa-sharp fa-solid fa-cart-plus"></i>
                                                </button>
                                            @else
                                                <input type="number" value="1" min="1"
                                                    max="{{ $similar_product->quantity }}" class="form-control"
                                                    name="quantity" style="width: 50px">
                                                <button type="submit" class="btn btn-primary m-2"><i
                                                        class="fa-sharp fa-solid fa-cart-plus"></i>
                                                </button>
                                            @endif

                                        </form>
                                        <form method="post"
                                            action="{{ url("user/product/add/wishlist/$similar_product->id") }}">
                                            @csrf
                                            <button type="submit" style="height: 35px" class="btn btn-primary mt-5"><i
                                                    class="fa-solid fa-heart-circle-plus"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- {{ $similar_products->links() }} --}}
            </div>
        </div>
    @endsection
