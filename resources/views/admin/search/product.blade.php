@extends('layouts.admin')
@section('content')

{{-- Search --}}
<div class="col-6 mb-3">
        <form action={{ url('admin/search/product') }} method="GET" role="search"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="search" class="form-control bg-light border-0 small" placeholder="Search for products ..."
                    name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

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
            @foreach ($searchProducts as $searchProduct)
                <tr>
                    <td >
                        <img src="{{ asset('products/') . '/' . $searchProduct->image }}" class="card-img-top"
                            style="width: 100px; height: 100px;">
                    </td>
                    <td>
                        <p class="mt-4">{{ $searchProduct->name }}</p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $searchProduct->description }} </p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $searchProduct->price }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $searchProduct->quantity }}</p>
                    </td>
                    <td>
                        <p class="mt-4">{{ $searchProduct->category }}</p>
                    </td>
                    <td>
                        <a href="{{ url('admin/product/edit/') . '/' . $searchProduct->id }}" class="btn btn-primary mt-4"><i
                                class="fa-sharp fa-solid fa-pen"></i></a>
                    </td>
                    <td>
                        <form method="post" action="{{ url("admin/product/delete/$searchProduct->id") }}">
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

    