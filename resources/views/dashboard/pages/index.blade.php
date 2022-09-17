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
                                        <h1 class="m-0 text-right">17</h1>
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
                                        <h1 class="m-0 text-right">214</h1>
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
                                        <h1 class="m-0 text-right">65154</h1>
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
                                    <!-- GRAPH GOES TO HERE -->
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
                                                <th scope="col">Bill No</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Bill Amount</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <th scope="row">INV104</th>
                                                <td>John Doe</td>
                                                <td>1,585.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">INV106</th>
                                                <td>Jane Doe</td>
                                                <td>1,494.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">INV107</th>
                                                <td>Sarah</td>
                                                <td>1,494.00</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">INV109</th>
                                                <td>Istiak Tushar</td>
                                                <td>1,494.00</td>
                                            </tr>
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

    <!-- SELLING-ITEM -->
    <section class="selling-items py-3 bg-white">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-3">
                                <div class="card header border-0">
                                    <h4 class="card-title">Top 5 Most Selling Items</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card mb-3">
                                                <img src="../img/food1.jpg" class="card-img-top" alt="selling-item1">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="card-title">Italian Pizza</h6>
                                                        <span class="badge badge-info" style="border-radius: 50%; width: 20px; height: 20px;">1</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card mb-3">
                                                <img src="../img/food1.jpg" class="card-img-top" alt="selling-item2">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="card-title">Szechwan Shrimp</h6>
                                                        <span class="badge badge-info" style="border-radius: 50%; width: 20px; height: 20px;">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-3">
                                                <img src="../img/food1.jpg" class="card-img-top" alt="selling-item3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="card-title">Masala Fried Pomfret</h6>
                                                        <span class="badge badge-info" style="border-radius: 50%; width: 20px; height: 20px;">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-3">
                                                <img src="../img/food1.jpg" class="card-img-top" alt="selling-item4">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="card-title">Greek Pizza</h6>
                                                        <span class="badge badge-info" style="border-radius: 50%; width: 20px; height: 20px;">4</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <img src="../img/food1.jpg" class="card-img-top" alt="selling-item5">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="card-title">Texi Burger</h6>
                                                        <span class="badge badge-info" style="border-radius: 50%; width: 20px; height: 20px;">5</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SELLING-ITEM -->

@endsection
