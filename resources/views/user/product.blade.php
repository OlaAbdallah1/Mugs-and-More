@extends('layouts.user')

@section('content')
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $product->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body d-flex">
                    <img src="{{ asset('products/') . '/' . $product->image }}" alt="">
                    <div class="container mx-5 mt-4">
                        <textarea class="card-text mb-2" rows="2"
                            style="word-wrap: break-word; border: none; background: inherit; color:#B95C50 " disabled>{{ $product->description }}</textarea>
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

                        <div class="card-group">
                            @foreach ($details_images as $detail_image)
                                <div class="mt-3">
                                    {{-- <div class="card"> --}}
                                    <div class="card-body">
                                        <img src="{{ asset('products/detailsImages/') . '/' . $detail_image->detail_image }}"
                                            style="width: 10rem">
                                    </div>

                                </div>
                                {{-- </div> --}}
                            @endforeach

                        </div>

                    </div>


                </div>
                <div class="section mx-3 w-50">

                    <div class="comment-wrapper">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <form action="{{ url("/user/product/feedback/$product->id") }}" method="POST">
                                    @csrf
                                    <textarea class="form-control" placeholder="Add your Feedback..." rows="3" name="feedback"></textarea>
                                <br>
                                <input type="file" name="image" id="image" class="form-control">
                                <button type="submit" class="btn btn-primary mt-3">Add</button>
                                </form>
                                
                                <hr>
                                <ul class="media-list">
                                    @foreach ($feedbacks as $feedback)
                                        <li class="media">
                                            <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted">{{ $feedback->created_at }}</small>
                                                </span>
                                                <strong class="text-success">{{ $username }}</strong>
                                                <p>
                                                    {{ $feedback->body }}
                                                </p>
                                                <img class="w-25 mb-3" src="{{ asset('products/feedbacks/').'/'.$feedback->image }}" alt="">
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

               
        @endsection
