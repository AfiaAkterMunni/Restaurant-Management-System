<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')-Restaurant Management System</title>
</head>
<body>
    <!-- SIDEBAR -->
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navbarNav">
            <i class="fas fa-align-right fa-lg text-info"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container-fluid">
                <div class="row">
                    <!-- SIDEBAR -->
                    <div class="col-xl-2 col-lg-3 col-md-4 fixed-top sidebar bg-dark text-light p-0">
                        <a href="dashboard.html" class="navbar-brand text-light text-uppercase d-block mx-auto mb-3 button-border p-2">
                            <h5 class="text-center"><i class="fas fa-utensils"></i> Restaurant <br> Management <br> System</h5>
                            <p class="text-center">Taste the myth</p>
                        </a>

                        <ul class="navbar-nav flex-column">
                            <li class="nav-item current">
                                <a href="dashboard.html" class="nav-link text-white mb-2">
                                    <i class="fas fa-tachometer-alt fa-lg mr-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('order.index')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-list-ul fa-lg mr-2"></i>Food Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('reservation.index')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-table fa-lg mr-2"></i>Table Reservation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('menu.index')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-file-alt fa-lg mr-2"></i>Menu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-user-circle fa-lg mr-2"></i>Admin List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="revenue.html" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-file-alt fa-lg mr-2"></i>Revenue Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('messages')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-envelope fa-lg mr-2"></i>Message
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('employee.index')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-users fa-lg mr-2"></i>Employees
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('expense.index')}}" class="nav-link text-white mb-2 sidebar-link">
                                    <i class="fas fa-dollar-sign fa-lg mr-2"></i>Expense
                                </a>
                            </li>
                        </ul>
                    </div><!-- ./SIDEBAR -->
                </div>
            </div>
        </div>
    </nav><!-- ./SIDEBAR -->

    <!-- TOPNAV -->
    <section class="topnav">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <h2><i class="fas fa-bars mr-3"></i> Dashboard</h2>
                            </a>
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" style="font-size: 1rem; text-transform: lowercase;">
                                <i class="fas fa-user-circle fa-lg"></i> Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#editProfileModal"><i class="fas fa-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#changePasswordModal"><i class="fas fa-cog"></i> Change Password</a>
                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#logOutModal"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!-- ./TOPNAV -->

    @yield('content')

    <!-- editProfileModal MODAL -->
    <div class="modal fade" id="editProfileModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="roomtype">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Your Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Your Password">
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Enter Phone Number">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" data-dismiss="modal">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./editProfileModal MODAL -->

    <!-- changePassword MODAL -->
    <div class="modal fade" id="changePasswordModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h5 class="modal-title">Change Password</h5>
                    <button class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="oldPassword">Old Password</label>
                            <input type="password" class="form-control" placeholder="Enter Old Password">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmNewPassword">Confirm New Password</label>
                            <input type="password" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" data-dismiss="modal">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./changePassword MODAL -->

    <!-- LogOut MODAL -->
    <div class="modal fade" id="logOutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-modal text-white">
                    <h4 class="modal-title">Want to leave?</h4>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="lead">Press logout to leave</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Stay Here</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ./LogOut MODAL -->

    <!-- JavaScript -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/Chart.bundle.min.js"></script>
    <!-- CHART JS -->
    <!-- CUSTOM JAVASCRIPT -->
    <script src="../js/main.js"></script>
</body>
</html>
