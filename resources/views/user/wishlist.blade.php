@extends('layouts.user')
@section('content')
    <div class="card-group">
        @foreach ($favs as $fav)
            <div class="">
                <div class="mt-3 mr-2" style="width: 14.5rem">
                    <div class="card">
                        <img src="{{ asset('products/') . '/' . $fav->image }}" class="card-img-top" style="width: 14.5rem">
                        <div class="card-body">
                            <h5 class="card-title">{{ $fav->product_name }}</h5>
                            <p class="mt-3">{{ $fav->price }} ₪</p>
                            @if ($fav->quantity == 0)
                            <span class="mb-2">Sold Out</span>
                        @else
                            <span class="mb-2">{{ $fav->quantity }} pieces</span>
                        @endif
                            <div class="d-flex">
                                <form method="post" action="{{ url("user/product/add/order/$fav->id") }}">
                                    @csrf
                                    @if ($fav->quantity == 0)
                                        <input type="number" value="0" class="form-control" name="quantity"
                                            style="width: 50px" disabled>
                                        <button type="submit" class="btn btn-primary mt-2" disabled><i
                                                class="fa-sharp fa-solid fa-cart-plus"></i>
                                        </button>
                                    @else
                                        <input type="number" value="1" min="1" max="{{ $fav->quantity }}"
                                            class="form-control" name="quantity" style="width: 50px">
                                        <button type="submit" class="btn btn-primary m-2"><i
                                                class="fa-sharp fa-solid fa-cart-plus"></i>
                                        </button>
                                    @endif
    
                                </form>
                               <form method="post" action="{{ url("user/wishlist/delete/$fav->id") }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn mt-2"> <i class="fa-solid fa-heart-circle-minus"></i>
                                    </i></button>
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
