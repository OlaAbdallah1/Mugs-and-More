@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="primary">
                    Add Product 
                </h4>
            </div>
            <div class="card-body w-100">
                <form method="POST" action="{{ url('admin/product') }}">
                    @csrf
                    <div class="mb-3">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <label for="name" class="col-form-label">Name</label>
                          </div>
                          <div class="col-2">
                            <input type="text" name="name" id="name" class="form-control" value= "{{ old('name') }}">
                          </div>
                    </div>
                       </div>
                       <div class="mb-3">
                       <div class="row align-items-center">
                        <div class="col-1">
                            <label for="image" class="col-form-label">Image</label>
                          </div>
                          <div class="col-2">
                            <input type="file" name="image" id="image" class="form-control" >
                          </div>
                       </div>
                       </div>
                  
                       <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <label for="price" class="col-form-label">Price </label>
                            </div>
                              <div class="col-2">
                                <input class="form-control w-15" id="price" name="price" value= "{{ old('price') }}">
                            </div>
                        </div>
                           </div> 
                       <div class="mb-3">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <label for="description" class="col-form-label">Description</label>
                            </div>
                              <div class="col-2">
                                <textarea type="text" name="description" class="form-control" placeholder="description"></textarea>
                            </div>
                        </div>
                           </div>
                            
                           <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="color" class="col-form-label">Color </label>
                                </div>
                                  <div class="col-2">
                                    <input class="form-control" type="color" id="color" name="color" value= "{{ old('color') }}">
                                </div>
                            </div>
                        </div>
                       
                           <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="quantity" class="col-form-label">Quantity </label>
                                </div>
                                  <div class="col-2">
                                    <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="10" value= "{{ old('quantity') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <label for="category" class="col-form-label">Categories</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="coffee" value="coffee">
                                    <label class="form-check-label" for="coffee">Coffee</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tea" value="tea">
                                    <label class="form-check-label" for="tea">Tea</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="antique" value="antique">
                                    <label class="form-check-label" for="antique">Antique</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="handmade" value="handmade">
                                    <label class="form-check-label" for="handmade">Hand Made</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="colorfull" value="colorfull">
                                    <label class="form-check-label" for="colorfull">Colorfull</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="classic" value="classic">
                                    <label class="form-check-label" for="classic">Classic</label>
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