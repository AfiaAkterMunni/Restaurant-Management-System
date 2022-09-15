@extends('frontend.layouts.master')
@section('title', 'Menus')
@section('content')

	<!-- Menu -->
    @foreach ($categories as $category)
    @if(! $category->menus->isEmpty())
        <div class="container" style="margin-top: 100px;">
            <h2>{{$category->name}} Menu</h2>
            <hr>
            <div class="row">
                @foreach ($category->menus as $menu)
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


{{--
	<!-- Top Launch Menu -->
	<div class="container">
		<h2>Launch Menu</h2>
		<hr>
		<div class="card-deck">
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
		</div>
	</div>



	<!-- Top Dinner Menu -->
	<div class="container">
		<h2>Dinner Menu</h2>
		<hr>
		<div class="card-deck">
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
			<div class="card border-0">
				<div class="card-img-wrap">
					<img src="img/pizza.jpg" class="card-img-top" alt="..." height="155">
				</div>
				<div class="card-body">
					<div class="clearfix">
						<h4 class="card-title float-left">Pizza</h4>
						<p class="card-text float-right border p-2 bg-success text-white rounded">Price: <i>&#2547; 160</i></p>
					</div>
					<small class="card-text text-muted">Tomato, Sauss, Bun, Onion</small>
				</div>
			</div>
		</div>
	</div> --}}

@endsection
