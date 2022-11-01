@extends('layouts.admin')
@section('content')
    <div class="row">
        <!-- Topbar Search -->
        <div class="col-6 mb-3">
            <form action={{ url('admin/search/purchase') }} method="GET" role="search"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="search" class="form-control bg-light border-0 small" placeholder="Search for..."
                        name="search" value="">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <div class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
    </div> 
    <span style="font-weight: 900; font-size: 2em">Earnings</span> 
    <table class="table table-striped">
        <thead>
            <tr>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Product</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Order Date</th>

            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <p class="mt-3">{{ $order->user_id }}</p>
                    </td>
                    <td>
                        <img src="{{ asset("products/$order->image") }}" alt=""  style="width: 50px; height: 50px;">
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->name }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->price }} </p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->quantity }} </p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->total }} </p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $order->deleted_at }}</p>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    @endsection
