@extends('layouts.admin')
@section('content')
    <div class="row">
        <!-- Topbar Search -->
        <div class="col-6 mb-3">
            <form action={{ url('user/search') }} method="GET" role="search"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="search" class="form-control bg-light border-0 small" placeholder="Search for products ..."
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

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <img src="{{ asset('products/') . '/' . $product->image }}" class="card-img-top"
                            style="width: 100px; height: 100px;">
                    </td>
                    <td>
                        <p class="mt-4">{{ $product->name }}</p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $product->description }} </p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $product->price }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $product->quantity }}</p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $product->category }}</p>
                    </td>
                    <td>
                        <a href="{{ url('admin/product/edit/') . '/' . $product->id }}" class="btn btn-primary mt-4"><i
                                class="fa-sharp fa-solid fa-pen"></i></a>
                    </td>
                    <td>
                        <form method="post" action="{{ url("admin/product/delete/$product->id") }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary mt-4"> <i class="fa-sharp fa-solid fa-trash "></i>
                                </i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endsection
