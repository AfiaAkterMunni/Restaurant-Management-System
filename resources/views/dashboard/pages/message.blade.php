@extends('dashboard.layouts.master')
@section('title', 'Employee')
@section('content')

    <!-- MESSAGE -->
    <section class="order-list py-3 common-shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            @if (session('deletemessage'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('deletemessage') }}
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-text">MESSAGE</h1>
                                </div>
                                <div class="card-body mx-auto">
                                    <table class="table table-responsive table-hover text-center">
                                        <thead class="thead-background">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($messages as $key=> $message)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{$message->name}}</td>
                                                <td>{{$message->email}}</td>
                                                <td>{{$message->subject}}</td>
                                                <td>{{$message->message}}</td>
                                                <td>
                                                    <a href="{{route('message.delete', ['id' => $message->id ])}}" class="btn btn-md btn-danger">Delete</a>
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
    </section><!-- ./MESSAGE-->

@endsection
