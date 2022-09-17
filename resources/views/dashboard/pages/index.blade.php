@extends('dashboard.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <!-- DASHBOARD-BAR -->
    <section class="dashbar py-3 bg-white">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body d-flex justify-content-between">
                                    <i class="fas fa-shopping-cart fa-2x mt-2"></i>
                                    <div>
                                        <h1 class="m-0 text-right">{{$totalOrder}}</h1>
                                        <p>Total Order</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body d-flex justify-content-between">
                                    <i class="fas fa-align-justify fa-2x mt-2"></i>
                                    <div>
                                        <h1 class="m-0 text-right">{{$totalItem}}</h1>
                                        <p>Total Item</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <i class="fas fa-money-bill-alt fa-2x mt-2"></i>
                                    <div>
                                        <h1 class="m-0 text-right">{{$profit}}</h1>
                                        <p>Total Profit</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./DASHBOARD-BAR -->

    <!-- REVENUE -->
    <section class="py-3 revenue bg-white common-shadow">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Last 7 Day's Revenue</h4>
                                </div>

                                <div class="card-body">
                                    {!!$revenueChart->container()!!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Today's Order</h4>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead class="border-top-0">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Bill Amount</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($todaysOrders as $key=> $todaysOrder)
                                            <tr>
                                                <th scope="row">{{ $key +1 }}</th>
                                                <td>{{$todaysOrder->name}}</td>
                                                <td>{{$todaysOrder->totalPrice}}</td>
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
    </section><!-- ./REVENUE -->
{{-- revenueChart --}}
@if($revenueChart)
{!! $revenueChart->script() !!}
@endif
@endsection
