@extends('layouts.app')

@section('content')
@section('title') 
Login 
@endsection
            <div class="card rounded-3 text-black-50">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">                            
                        <form method="POST" action="{{ route('login') }}" class="w-100 m-auto mt-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline mb-5 mt-5">
                        <input name="email" type="email"  value= "{{ old('email')}}" class="form-control @error('email') is-invalid @enderror"  placeholder="Email" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
            <div class="form-outline mb-4">
                <input name="password" type="password" class="form-control"  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            <div class="text-center pt-1 mb-5 pb-1">
                <button class="btn btn-inline-danger btn-block fa-lg gradient-custom-2 mb-3 mt-2" type="submit">Log
                    in</button>
                  
                </div>
        </form>
                <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="{{ route('register') }}" type="submit" class="btn btn-outline1-danger" >Create new</a>
                    </div>
        
    </div>
    </div>
    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
        <img src="{{ asset('user/assets/img/Mugs & More (3).png') }}"  class="rounded center w-100 p-1  mx-auto d-block">
            </div>
        </div>
    </div>
</div>
    

@endsection
