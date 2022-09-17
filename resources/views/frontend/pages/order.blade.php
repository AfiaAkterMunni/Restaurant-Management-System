@extends('frontend.layouts.master')
@section('title', 'Order')
@section('content')
    <div class="container-fluid" style="margin-top: 100px;">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
        @endif
        <h1 class="text-center text-center text-uppercase font-weight-bold mb-4">Place Your Order Here</h1>
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    name="email">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-3 col-form-label">Phone</label>
                            <div class="col-9">
                                <input type="tel" class="form-control" id="phone" placeholder="Phone"
                                    name="phone">
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-3 col-form-label">Location</label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="location" placeholder="Enter Your Location"
                                    name="location">
                                @error('location')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-3">Choose Item</label>
                            <div class="col-9">
                                <div class="row">
                                    @foreach ($menus as $menu)
                                        <label class="form-check checkbox-inline">
                                            <input type="checkbox" name="menus[]"
                                                value="{{ $menu->id}}-{{$menu->price}}"> {{ $menu->name }} ({{ $menu->price }})
                                        </label>
                                    @endforeach
                                    @error('menus')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Order Type</label>
                            <div class="col-9">
                                <input type="radio"  id="option1" name="orderType" value="Delivery"> Delivery</label><br>
                                <input type="radio" id="option2" name="orderType" value="PickUp"> PickUp</label>
                            </div>
                            @error('orderType')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-info px-5 py-3">Order Food</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
@endsection
