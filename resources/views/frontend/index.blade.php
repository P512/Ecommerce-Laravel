@extends('layouts.app')
@section('title','Home Page')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <style>
        .custom-carousel-content,.slider_img{
            position: relative;
            animation-name: example;
            animation-duration: 1s;
        }
        @keyframes example {
            0%  {left:0px; top:200px;}
            100% {left:0px; top:0px;}
            }
    </style>
    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{ $key == '0' ? 'active':'' }} ">
            @if($sliderItem->image)
            <img src="{{ asset("$sliderItem->image") }}" class="slider_img" style="height:350px; float:right; margin:90px 50px 90px 0px;">
            <div style="background-color: {{ $appSetting->color_code }}; height:500px;"></div>
            @endif
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {!! $sliderItem->title !!}
                    </h1>
                    <p>
                        {!! $sliderItem->description !!}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script>
        // Add JavaScript here if needed
    </script>


    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome To FlaWave</h4>
                    <div class="underline w-100"></div>
                    <p>FlaWave is an innovative e-commerce platform dedicated to promoting sustainability and eco-conscious consumerism. At FlaWave, we believe in harnessing the power of commerce to drive positive environmental change. Our mission is to provide a curated marketplace where customers can discover and purchase a wide range of environmentally friendly products, from organic clothing and sustainable home goods to renewable energy solutions and zero-waste lifestyle essentials.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if($trendingProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($trendingProducts as $productItem)
                        <div class="item">
                        <div class="box">

                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock bg-success">New</label>
                                    @if($productItem->productImages->count()>0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                    </a>
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $productItem->brand }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                            {{ $productItem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">₹{{ $productItem->selling_price }}</span>
                                        <span class="original-price">₹{{ $productItem->original_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>
                            No Products Avialable For {{ $category->name }}
                        </h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>
                @if($newArrivalProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($newArrivalProducts as $productItem)
                        <div class="item">
                        <div class="box">

                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock bg-success">New</label>
                                    @if($productItem->productImages->count()>0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                    </a>
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $productItem->brand }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                            {{ $productItem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">₹{{ $productItem->selling_price }}</span>
                                        <span class="original-price">₹{{ $productItem->original_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>
                            No New Arrivals Avialable.
                        </h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products
                        <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>
                @if($featuredProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($featuredProducts as $productItem)
                        <div class="item">
                        <div class="box">

                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock bg-success">New</label>
                                    @if($productItem->productImages->count()>0)
                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                    </a>
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $productItem->brand }}</p>
                                    <h5 class="product-name">
                                        <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                            {{ $productItem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">₹{{ $productItem->selling_price }}</span>
                                        <span class="original-price">₹{{ $productItem->original_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>
                            No Featured Products Avialable.
                        </h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    @endsection


    @section('script')
    <script>
        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>

    @endsection
