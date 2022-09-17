@extends('frontend.layouts.master')
@section('title', 'Reservation')
@section('content')

<!-- RESERVATION -->
<div class="reservation pt-5">
    <h1 class="h1 text-center font-weight-bold text-uppercase mt-4">Reservation</h1>
    <div class="title-bottom"></div>
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
        @endif
        <div class="row gutters">
            <div class="col-6">
                <div class="card my-5" style="box-shadow: 0px 0px 2px 2px #ccc;">
                    <div class="card-body">
                        <img src="img/reservation.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card my-5" style="box-shadow: 0px 0px 2px 2px #ccc;">
                    <h3 class="card-header text-center">Table Reservation</h3>
                    <div class="card-body">
                        <form action="{{route('reservation.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name2" class="col-3 col-form-label">Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="name2" placeholder="Name" name="name">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email2" class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <input type="email" class="form-control" id="email2" placeholder="Email" name="email">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-3 col-form-label">Phone</label>
                                <div class="col-9">
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone">
                                    @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Tableno" class="col-3 col-form-lable">Table Number</label>
                                <div class="col-9">
                                    <select class="form-control" id="Tableno" name="table_no">
                                        <option>-- Select Your Table --</option>
                                        @for ($i = 1; $i<=10; $i++)
                                        <option value = '{{$i}}'>{{$i}}</option>
                                        @endfor
                                    </select>
                                    @error('table_no')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Date</label>
                                <div class="col">
                                    <input type="date" class="form-control" placeholder="On which date" name="date">
                                    @error('date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <label class="col-2 col-form-label">Time</label>
                                <div class="col">
                                    <input type="time" class="form-control" placeholder="On which time" name="time">
                                    @error('time')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guest" class="col-3 col-form-label">No of Guest</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" id="guest" placeholder="Number of Guest" name="guest_no">
                                    @error('guest_no')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-info">Book Your Table</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
