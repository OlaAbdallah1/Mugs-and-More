@extends('layouts.admin')
@section('content')


@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="primary">
                        Add Product
                    </h4>
                </div>
                <div class="card-body w-100">
                    <form method="POST" action="{{ url('admin/product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="name" class="col-form-label">Name</label>
                                </div>
                                <div class="col-2">
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="image" class="col-form-label">Image</label>
                                </div>
                                <div class="col-2">
                                    <input type="file" name="image" id="image" class="form-control">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="clone hide">

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
                        </div>

                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="price" class="col-form-label">Price </label>
                                </div>
                                <div class="col-2">
                                    <input class="form-control w-15 @error('price') is-invalid @enderror" id="price" name="price"
                                        value="{{ old('price') }}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                    <textarea name="description" class="form-control" placeholder="description"></textarea>
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
                                        value="{{ old('color') }}">
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
                                        max="10" value="{{ old('quantity') }}">
                                </div>
                            </div>
                        </div>

                       

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
