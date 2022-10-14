@extends('layouts.admin')


@section('content')
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success'); }} </div>
    @endif
    @if (session()->has('update'))
    <div class="alert alert-success">{{ session()->get('update'); }} </div>
@endif


<div class="card-group ">
    @foreach ($products as $product)
    <div class="mr-3">
         <div class="card">
            <img src="{{asset('uploads/product/').'/'.$product->image}}" class="card-img-top" style="width: 17rem">

            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text mb-2">{{ $product->description }}</p>
              <p class="mb-2"> {{ $product->price }} ₪ </p>
              <span class="mb-2">{{ $product->quantity }} pieces</span> 
                    <div style="display: flex">
                        <a href="{{ url('admin/product/edit/').'/'.$product->id }}" class="btn btn-primary mt-2"><i class="fa-sharp fa-solid fa-pen"></i></a>
                        <form method="post" action="{{ url("admin/product/delete/$product->id") }}">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-primary mt-2"> <i class="fa-sharp fa-solid fa-trash"></i>
                        </i></button>   
                        </form>
                    </div>     
            </div>
    </div>
    </div>
       
    @endforeach
</div>  



</div>
<div class="row ">
    {{ $products->links() }}
</div>
@endsection
