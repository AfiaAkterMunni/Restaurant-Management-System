@extends('dashboard.layouts.master')
@section('title', 'Order List')
@section('content')

    <!-- ORDER LIST -->
    <section class="order-list py-3 common-shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            @if (session('approve'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('approve') }}
                            </div>
                            @endif
                            @if (session('delete'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('delete') }}
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-text">Orders List</h1>
                                </div>
                                <div class="card-body">
                                    <table class="table table-responsive table-hover text-center">
                                        <thead class="thead-background">
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Order Type</th>
                                                <th scope="col">Food List</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($orders as $key=> $order)
                                            <tr>
                                                <th scope="row">{{$key + 1}}</th>
                                                <td>{{$order->name}}</td>
                                                <td>{{$order->email}}</td>
                                                <td>{{$order->location}}</td>
                                                <td>{{$order->orderType}}</td>
                                                <td>{{$order->menus->pluck('name')}}</td>
                                                <td>{{$order->phone}}</td>
                                                <td>{{$order->totalPrice}}</td>
                                                @if($order->status == false)
                                                    <td>Pending</td>
                                                @else
                                                    <td>Confirm</td>
                                                @endif
                                                <td>{{$order->created_at->format('M d,Y')}}</td>
                                                <td>{{$order->created_at->format('H:m a')}}</td>
                                                <td>
                                                    <a href="{{route('order.approve', ['id' => $order->id])}}" class="btn btn-md btn-primary m-1">Approve</a>
                                                    <a href="{{route('order.delete', ['id' => $order->id])}}" class="btn btn-md btn-danger m-1">Cancel</a>
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
    </section><!-- ./ORDER LIST-->

@endsection
