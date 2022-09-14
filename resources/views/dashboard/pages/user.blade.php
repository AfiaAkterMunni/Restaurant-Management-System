@extends('dashboard.layouts.master')
@section('title', 'Admin List')
@section('content')

    <!-- NEWADMIN -->
    <section class="order-list py-3 common-shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            @if (session('adduser'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('adduser') }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-text">ADMIN LIST</h1>
                                    <div>
                                        <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#newAdminModal"><i class="fas fa-plus-circle"></i> Add Admin</button>
                                    </div>
                                </div>
                                <div class="card-body mx-auto">
                                    <table class="table table-responsive table-hover text-center">
                                        <thead class="thead-background">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($users as $key => $user)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
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
    </section><!-- ./NEWADMIN-->

    <!-- newAdminModal MODAL -->
    <div class="modal fade" id="newAdminModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h5 class="modal-title">Registration</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="roomtype">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" name="name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Enter Phone Number" name="phone">
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Your Password" name="password_confirmation">
                            @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ./newAdminModal MODAL -->

@endsection
