{{-- @extends('layouts.user')
@section('content')

<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">fav</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        
        @foreach ($favs as $fav)
          <tr>
            <th scope="row"><img src="{{ asset('uploads/fav').'/'.$fav->image }}" style="width: 50px; height: 50px;" ></th>
            <td><p class="mt-3">{{ $fav->fav_name }}</p> </td>
            
            <td><p class="mt-3">{{ $fav->price }}</p></td>
            <td> 
                <form method="post" action="{{ url("user/wishlist/delete/$fav->id") }}">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn mt-2"> <i class="fa-solid fa-heart-circle-minus"></i>
            </i></button>   
            </form>
            </td>
          </tr>
          @endforeach
      </tbody>
            
  </table>




@endsection    


 --}}

 @extends('layouts.user')
@section('content')

<div class="card-group ">
    @foreach ($favs as $fav)
    <div class="">
        <div class="mt-3 mr-2" style="width: 14.5rem">
         <div class="card" >
            <img src="{{asset('uploads/product/').'/'.$fav->image}}" class="card-img-top" style="width: 14.5rem">
            <div class="card-body">
              <h5 class="card-title">{{ $fav->product_name }}</h5>
              <p class="mt-3">{{ $fav->price }} ₪</p>
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
    @endforeach
</div>  
</div>

@endsection

