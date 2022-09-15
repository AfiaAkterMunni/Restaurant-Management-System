@extends('dashboard.layouts.master')
@section('title', 'Menu')
@section('content')

    <!-- MENU -->
    <section class="order-list py-3 common-shadow">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row mb-5">
                        <div class="col-12">
                            @if (session('deletemenu'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('deletemenu') }}
                            </div>
                            @endif
                            @if (session('updatemenu'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('updatemenu') }}
                            </div>
                            @endif
                            @if (session('addmenu'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('addmenu') }}
                            </div>
                            @endif
                            @if (session('addcategory'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('addcategory') }}
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h1 class="card-text">Menu</h1>
                                    <div>
                                        <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addFoodModal"><i class="fas fa-plus-circle"></i> Add Food</button>
                                        <button class="btn btn-lg btn-success ml-auto" data-toggle="modal" data-target="#addCategoryModal"><i class="fas fa-plus-circle"></i> Add Category</button>
                                    </div>
                                </div>
                                <div class="card-body mx-auto">
                                    <table class="table table-responsive table-hover text-center">
                                        <thead class="thead-background">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Food Name</th>
                                                <th scope="col">Food Image</th>
                                                <th scope="col">Food Category</th>
                                                <th scope="col">Food Details</th>
                                                <th scope="col">Food Price</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($menus as $key => $menu)
                                            <tr>
                                                <th scope="row">{{$key + 1}}</th>
                                                <td>{{$menu->name}}</td>
                                                <td>
                                                    <img src="{{asset('uploads/menus/'.$menu->image)}}" alt="" width="80">
                                                </td>
                                                <td>{{$menu->category->name}}</td>
                                                <td>{{$menu->details}}</td>
                                                <td>{{$menu->price}}</td>
                                                <td>
                                                    <button class="btn btn-md btn-primary m-1" data-toggle="modal" data-target="#editFoodModal-{{$menu->id}}">Edit</button>
                                                    <a href="{{route('menu.delete', ['id' => $menu->id ])}}" class="btn btn-md btn-danger m-1">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$menus->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ./MENU-->

    <!-- addFoodModal MODAL -->
    <div class="modal fade h-100" id="addFoodModal" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h5 class="modal-title">Add Food Item</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foodname">Food Name</label>
                            <input type="text" class="form-control" placeholder="Enter Food Name" name="name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foodImage">Food Image</label>
                            <input type="file" class="form-control-file" placeholder="Choose Food Image" name="image">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fooddetails">Food Details</label>
                            <textarea class="form-control" style="resize: none;" name="details"></textarea>
                            @error('details')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foodcategory">Food Category</label>
                            <select class="form-control" name="category">
                                <option disabled selected>-- Select Food Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Food Price</label>
                            <input type="text" class="form-control" placeholder="Enter Price" name="price">
                            @error('price')
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
    <!-- ./addFoodModal MODAL -->

    <!-- EditFoodModal MODAL -->
    @foreach ($menus as $menu)
    <div class="modal fade" id="editFoodModal-{{ $menu->id }}" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h5 class="modal-title">Edit Food Item</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('menu.update', ['id'=>$menu->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foodname">Food Name</label>
                            <input type="text" class="form-control" name="name1" value="{{old('name1') ?? $menu->name}}">
                            @error('name1')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foodImage">Food Image</label>
                            <input type="file" class="form-control-file" placeholder="Choose Food Image" name="image1" value="{{old('image1') ?? $menu->image}}">
                            @error('image1')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foodcategory">Food Category</label>
                            <select class="form-control" name="category1">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if ($menu->category_id == $category->id) selected @elseif (old('category1') == $category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category1')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fooddetails">Food Details</label>
                            <textarea class="form-control"  name="details1">{{old('details1') ?? $menu->details}}</textarea>
                            @error('details1')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Food Price</label>
                            <input type="text" class="form-control" name="price1" value="{{old('price1') ?? $menu->price}}">
                            @error('price1')
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
    @endforeach
    <!-- ./EditFoodModal MODAL -->

    <!-- addCategoryModal MODAL -->
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h5 class="modal-title">Add Category</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="addcategory">Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="name">
                            @error('name')
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
    <!-- ./addCategoryModal MODAL -->

@endsection
