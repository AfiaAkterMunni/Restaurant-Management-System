@extends('dashboard.layouts.master')
@section('title', 'Expenses')
@section('content')


<!-- DETAILS -->
<section class="common-shadow py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row mb-5">
                    <div class="col-12">
                        @if (session('deleteexpense'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('deleteexpense') }}
                        </div>
                        @endif
                        @if (session('updateexpense'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('updateexpense') }}
                        </div>
                        @endif
                        @if (session('addexpense'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('addexpense') }}
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h1 class="card-text">Expense</h1>
                                <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addExpenseModal"><i class="fas fa-plus-circle"></i> Add Expense</button>
                            </div>
                            <div class="card-body mx-auto">
                                <table class="table table-responsive table-striped text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Expense ID</th>
                                            <th scope="col">Expense Category</th>
                                            <th scope="col">Expense Amount</th>
                                            <th scope="col">Expense Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($expenses as $key => $expense)
                                        <tr>
                                            <th scope="row">{{$key + $expenses->firstItem()}}</th>
                                            <td>{{$expense->category}}</td>
                                            <td>{{$expense->amount}} <span class="h3">&#2547;</span></td>
                                            <td>{{$expense->date}}</td>
                                            <td>
                                                <button class="btn btn-md btn-success" data-toggle="modal" data-target="#editExpenseModal-{{ $expense->id }}">Edit</button>
                                                <a href="{{route('expense.delete', ['id' => $expense->id ])}}" class="btn btn-md btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{$expenses->links()}}
            </div>
        </div>
    </div>
</section><!-- ./DETAILS-->



<!-- Expense MODAL -->
<div class="modal fade" id="addExpenseModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Expense</h5>
                <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('expense.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Expense Category</label>
                        <input type="text" class="form-control" name="category">
                        @error('category')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Expense Amount</label>
                        <input type="text" class="form-control" name="amount">
                        @error('amount')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Expense Date</label>
                        <input type="date" class="form-control" name="date">
                        @error('date')
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
</div><!-- ./Expense MODAL -->

<!-- Edit Expense MODAL -->
@foreach ($expenses as $expense)

<div class="modal fade" id="editExpenseModal-{{ $expense->id }}" tabIndex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Edit Expense</h5>
                <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('expense.update', ['id' => $expense->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Expense Category</label>
                        <input type="text" class="form-control" name="category" value="{{ old('category') ?? $expense->category }}">
                        @error('category')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Expense Amount</label>
                        <input type="text" class="form-control" name="amount" value="{{ old('amount') ??  $expense->amount }}">
                        @error('amount')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Expense Date</label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') ??  $expense->date }}">
                        @error('date')
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
</div><!-- ./Edit Expense MODAL -->
@endforeach

@endsection
