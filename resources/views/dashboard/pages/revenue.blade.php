@extends('dashboard.layouts.master')
@section('title', 'Revenue')
@section('content')

   <!-- REVENUE -->
    <section class="common-shadow py-3">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title text-center">Revenue Report</h1>
                                </div>
                                <div class="card-body">
                                    {!!$revenueChart->container()!!}
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
