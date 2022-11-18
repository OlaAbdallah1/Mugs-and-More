@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="primary">
                        Edit Product {{ $product->name }}
                    </h4>
                </div>
                <div class="card-body w-100">
                    <form method="post" action="{{ url("admin/product/update/$product->id") }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="name" class="col-form-label">Name</label>
                                </div>
                                <div class="col-2">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $product->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="image" class="col-form-label">Image</label>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('products/') . '/' . $product->image }}" class="card-img-top"
                                        style="width: 8rem">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="detailsImages" class="col-form-label">Details Images</label>
                                </div>
                                <div class="col-2">
                                    <input type="file" name="details_images[]" class="form-control" multiple>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="price" class="col-form-label">Price </label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control w-15" id="price" name="price"
                                        value="{{ $product->price }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="category" class="col-form-label">Category </label>
                                </div>
                                <div class="col-2">
                                    <select name="category" id="category" class="form-control">
                                        <option value="glass">Glasses</option>
                                        <option value="funkey">Funkey</option>
                                        <option value="fancy">Fancy</option>
                                        <option value="cup">Cup</option>
                                        <option value="plate">Plate</option>
                                        <option value="kettle">Kettle</option>
                                        <option value="simple">Simple</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="description" class="col-form-label">Description</label>
                                </div>
                                <div class="col-2">
                                    <textarea type="text" name="description" class="form-control" placeholder="description"
                                        value="{{ $product->description }}"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="color" class="col-form-label">Color </label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="color" id="color" name="color"
                                        value="{{ $product->color }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="quantity" class="col-form-label">Quantity </label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="number" id="quantity" name="quantity" min="1"
                                        max="10" value="{{ $product->quantity }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
