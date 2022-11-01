@extends('layouts.admin')
@section('content')
<!-- Content Row -->
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
  <!-- Earnings -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ url('admin/earnings') }}" class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Earnings </a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 
                      $purchased_operations->sum('total_cost')
                      }} ₪</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ url('/admin/orders') }}" class="text-xs font-weight-bold text-info text-uppercase mb-1">All Orders
                    </a>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $purchased_operations->count('id') }}</div>
                          </div>
                          
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      <i class=""></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- In Stock Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ url('/admin/status/instock') }}" class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          In Stock Orders</a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $purchased_operations->where('status','=','0')->count() }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-light fa-shop fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- out orders Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <a href="{{ url('/admin/status/outorders') }}" class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                          Out Orders</a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $purchased_operations->where('status','=','1')->count() }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-light fa-outdent fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  <!-- Delivered Orders Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <a href="{{ url('/admin/status/delivered') }}" class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Delivered Orders</a>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $purchased_operations->where('status','=','2')->count() }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-circle-check fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>

  @endsection