@extends('dashboard.layouts.master')
@section('title', 'Employee')
@section('content')

    <!-- TABLE RESERVATION -->
    <section class="order-list py-3 common-shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            @if (session('deletereservation'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('deletereservation') }}
                            </div>
                            @endif
                            @if (session('approve'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('approve') }}
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-text">Table Reservation</h1>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-striped text-center">
                                        <thead class="thead-background">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Table No</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Guest No</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($reservations as $key=> $reservation)
                                            <tr>
                                                <th scope="row">{{$key + 1}}</th>
                                                <td>{{$reservation->name}}</td>
                                                <td>{{$reservation->email}}</td>
                                                <td>{{$reservation->phone}}</td>
                                                <td>{{$reservation->table_no}}</td>
                                                <td>{{$reservation->date}}</td>
                                                <td>{{$reservation->time}}</td>
                                                <td>{{$reservation->guest_no}}</td>
                                                @if($reservation->status == false)
                                                    <td>Pending</td>
                                                @else
                                                    <td>Confirm</td>
                                                @endif
                                                <td>
                                                    <a href="{{route('reservation.approve', ['id' => $reservation->id])}}" class="btn btn-md btn-success m-1">Approve</a>
                                                    <a href="{{route('reservation.delete', ['id' => $reservation->id])}}" class="btn btn-md btn-danger m-1">Cancel</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./TABLE RESERVATION-->

@endsection
