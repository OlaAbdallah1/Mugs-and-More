@extends('layouts.user')
@section('content')

<div class="card-group ">
    @foreach ($products as $product)
    <div class="">
        <div class="mt-3 mr-2" style="width: 14.5rem">
         <div class="card" >
            <img src="{{asset('uploads/product/').'/'.$product->image}}" class="card-img-top" style="width: 14.5rem">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <textarea class="card-text mb-2" rows="2" style="word-wrap: break-word; border: none; background: inherit; color:#B95C50 " disabled>{{ $product->description }}</textarea>

              <p class="mb-2"> {{ $product->price }} ₪ </p>
              @if ($product->quantity == 0) 
                <span class="mb-2">Sold Out</span> 
                @else 
                    <span class="mb-2">{{ $product->quantity }} pieces</span> 
                
              @endif
                    <div style="display: flex">
                       
                        <form method="post" action="{{ url("user/product/add/order/$product->id") }}">
                            @csrf
                            @if ($product->quantity == 0) 
                            <input type="number" value="0" class="form-control" name="quantity" style="width: 50px" disabled>
                            <button type="submit" class="btn btn-primary mt-2" disabled><i class="fa-sharp fa-solid fa-cart-plus"></i>
                            </button>   
                            @else 
                            <input type="number" value="1" min="1" max="{{ $product->quantity }}" class="form-control" name="quantity" style="width: 50px">
                            <button type="submit" class="btn btn-primary mt-2"><i class="fa-sharp fa-solid fa-cart-plus"></i>
                            </button>   
                          @endif
                       
                        </form>

                        <form method="post" action="{{ url("user/product/add/wishlist/$product->id") }}">
                            @csrf
                        <button type="submit" style="height: 35px" class="btn btn-primary mt-5 mx-2"><i class="fa-solid fa-heart-circle-plus"></i></button>
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
