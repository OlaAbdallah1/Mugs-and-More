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
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Area</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Shipping cost</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Purchased Date</th>
                <th scope="col"></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($searchPurchases as $searchPurchase)
            <tr >
                <td>  <p class="mt-3" style="font-weight: 900"> . </p> </td>
                <td>
                    @if ($searchPurchase->area == 20)
                        <p class="mt-3">West Bank </p>
                   @elseif ($searchPurchase->area == 30)
                    <p class="mt-3">Jerusalem </p>
                @elseif  ($searchPurchase->area == 50)
                    <p class="mt-3">48 Land </p>
                @endif

                </td>
                    <td>
                        <p class="mt-3">{{ $searchPurchase->postal_code }}</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $searchPurchase->shipping_cost }} ₪</p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $searchPurchase->total_cost }} </p>
                    </td>
                    <td>
                        <p class="mt-3">{{ $searchPurchase->created_at }}</p>
                    </td>
                    <td>
                        <a href="{{ url("/admin/purchases/$searchPurchase->id") }}" class="btn mt-2" style="color: #E8B4B8;">View details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection