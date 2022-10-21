@extends('layouts.admin')
@section('content')
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
                    <td >
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

    