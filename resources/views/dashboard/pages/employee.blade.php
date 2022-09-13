@extends('dashboard.layouts.master')
@section('title', 'Employee')
@section('content')

<!-- DETAILS -->
<section class="common-shadow py-3">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row">
                    <div class="col-12">
                        @if (session('deleteemployee'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('deleteemployee') }}
                        </div>
                        @endif
                        @if (session('updateemployee'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('updateemployee') }}
                        </div>
                        @endif
                        @if (session('addemployee'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('addemployee') }}
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h1 class="card-text">Employees</h1>
                                <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addUserModal"><i class="fas fa-plus-circle"></i> Add Employee</button>
                            </div>
                            <div class="card-body mx-auto">
                                <table class="table table-responsive table-striped text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Employee ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Salary</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($employees as $key=> $employee)
                                        <tr>
                                            <th scope="row">{{$key + $employees->firstItem()}}</th>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->designation}}</td>
                                            <td>{{$employee->address}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{$employee->salary}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#editEmployeeModal-{{ $employee->id }}">Edit</button>
                                                <a href="{{route('employee.delete', ['id' => $employee->id ])}}" class="btn btn-md btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{$employees->links()}}
            </div>
        </div>
    </div>
</section><!-- ./DETAILS -->

<!-- ADD STUFF MODAL -->
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button class="close text-light" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" name="designation">
                        @error('designation')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Phone</label>
                        <input type="tel" class="form-control" name="phone">
                        @error('phone')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Address</label>
                        <input type="text" class="form-control" name="address">
                        @error('address')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Salary</label>
                        <input type="text" class="form-control" name="salary">
                        @error('salary')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div><!-- ./ADD STUFF MODAL -->

<!-- EDIT STUFF MODAL -->
@foreach ($employees as $employee)
<div class="modal fade" id="editEmployeeModal-{{ $employee->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>
                <button class="close text-light" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('employee.update', ['id' => $employee->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name1" value="{{old('name1') ?? $employee->name}}">
                        @error('name1')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email1" value="{{old('email1') ?? $employee->email}}">
                        @error('email1')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" name="designation1" value="{{old('designation1') ?? $employee->designation}}">
                        @error('designation1')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Phone</label>
                        <input type="tel" class="form-control" name="phone1" value="{{old('phone1') ?? $employee->phone}}">
                        @error('phone1')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Address</label>
                        <input type="text" class="form-control" name="address1" value="{{old('address1') ?? $employee->address}}">
                        @error('address1')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Salary</label>
                        <input type="text" class="form-control" name="salary1" value="{{old('salary1') ?? $employee->salary}}">
                        @error('salary1')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div><!-- ./EDIT STUFF MODAL -->
@endforeach


@endsection
