@extends('layouts.slider')
@section('slider')
<div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <div class="featured-carousel owl-carousel">
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/funkey.jpg);">
                            <div class="text w-100">
                                <span class="cat"> <a href="{{ url('user/home/funkey/') }}">Funkey Mugs</a> </span>
                                <h3 style="color: white">Find Your Special Funky Mugs</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/cups.jpg);">
                            <div class="text w-100">
                                <span class="cat"><a href="{{ url('user/home/cups/') }}">Cups</a> </span>
                                <h3 style="color: white">Add a Beauty Taste To Your Drink</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/elegant.jpg);">
                            <div class="text w-100">
                                <span class="cat"> <a href="{{ url('user/home/simple/') }}">Simple & Elegant</a> </span>
                                <h3 style="color: white">Simplecity is Elegancy</h3>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/glass.jpg);">
                            <div class="text w-100">
                                <span class="cat"> <a href="{{ url('user/home/glasses/') }}">Glasses</a> </span>
                                <h3 style="color: white">Clear Glasses Always Useful</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/fancy.jpg);">
                            <div class="text w-100">
                                <span class="cat"> <a href="{{ url('user/home/fancy/') }}">Fancy</a> </span>
                                <h3 style="color: white">Spicial, Fancy Cups</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/plate.jpg);">
                            <div class="text w-100">
                                <span class="cat"> <a href="{{ url('user/home/plates/') }}">Plates</a> </span>
                                <h3 style="color: white">For Your Kitchen</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="work">
                        <div class="img d-flex align-items-end justify-content-center" style="background-image: url(/slider/images/kettle.jpg);">
                            <div class="text w-100">
                                <span class="cat"> <a href="{{ url('user/home/kettle/') }}">Teapots</a> </span>
                                <h3 style="color: white">Special Teapots</h3>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection