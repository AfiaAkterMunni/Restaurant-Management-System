@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')

	<!-- Slider -->
	<div class="container" style="height: 500px; margin-bottom: 50px;">
		<div id="sliderCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#sliderCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#sliderCarousel" data-slide-to="1"></li>
				<li data-target="#sliderCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
                @foreach ($sliders as $key=> $slider)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <img src="{{ asset('uploads/menus/' . $slider->image) }}" class="d-block w-100
                        " alt="..." style="width: 100%; height: 550px!important;">
                        <div class="carousel-caption d-none d-block bg-danger mb-5" style="opacity: 0.7;">
                            <h3>{{ $slider->name }}</h3>
                            <p>{{ $slider->details }}</p>
                        </div>
                    </div>
                @endforeach
			</div>
			<a class="carousel-control-prev" href="#sliderCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#sliderCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>


	<!-- Order and Reservation Form -->
	<div class="container">
		<div class="row" style="margin-top: 70px; margin-bottom: 30px;">
			<div class="col-6">
				<div class="card" style="box-shadow: 0px 0px 10px 10px #ccc;">
					<h3 class="card-header text-center">Food Order</h3>
					<div class="card-body text-center p-3">
						<h1 class="display-1"><i class="far fa-user"></i></h1>
						<h4>We serve you the best food.</h4>
						<h5>at the time you want</h5>
						<p>You can Reserve a table by clicking the following button.</p>
						<a href="order.html" class="btn btn-info my-1">Order Your Food</a>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card" style="box-shadow: 0px 0px 10px 10px #ccc;">
					<h3 class="card-header text-center">Table Reservation</h3>
					<div class="card-body text-center p-3">
						<h1 class="display-1"><i class="far fa-clock"></i></h1>
						<h4>We serve you the best food.</h4>
						<h5>at the time you want</h5>
						<p>You can Reserve a table by clicking the following button.</p>
						<a href="reservation.html" class="btn btn-info my-1">Choose Your Table</a>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Top Menu -->
    @foreach ($categories as $category)
    @if(! $category->menus->isEmpty())
	<div class="container">
		<h2>{{$category->name}} Menu</h2>
		<hr>
		<div class="row">
            @foreach ($category->menus->take(4) as $menu)
            <div class="col-3">
                <div class="card-deck">
                    <div class="card border-0">
                        <div class="card-img-wrap">
                            <img src="{{asset('uploads/menus/'.$menu->image)}}" class="card-img-top" alt="..." height="155">
                        </div>
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="card-title float-left">{{$menu->name}}</h4>
                                <p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; {{$menu->price}}</i></p>
                            </div>
                            <small class="card-text text-muted">{{$menu->details}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
	</div>
    @endif
    @endforeach
@endsection
