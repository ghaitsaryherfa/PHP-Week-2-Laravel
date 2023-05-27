<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shopping Expenses</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('shopping.index') }}">
                <div class="sidebar-brand-text">Shopping Expenses</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shopping.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Table Expenses</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ghaitsa Ryherfa</span>
                                <i class="fas fa-laugh-wink"></i>
                                <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Create Shopping</h1>
                    <p class="mb-4">Fill shopping items into the input file to create a shopping list</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Shopping Expenses</h6>
                        </div>
                        <div class="card-body">
                            <form class="shopping" method="POST" action="{{ route('shopping.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Title</label>
                                        <input type="text" class="form-control" name="shopping_title" placeholder="Shopping Title">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Description</label>
                                        <input type="text" class="form-control" name="shopping_description" placeholder="Shopping Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <lable>Shopping Category</lable>
                                        <select class="form-control" name="shopping_category">
                                            <option value="">Shopping Category</option>
                                            <option value="entertainment">Entertainment</option>
                                            <option value="food-beverage">Food and Beverage</option>
                                            <option value="furniture-decor">Furniture and Decor</option>
                                            <option value="health-wellness-beauty">Health, Wellness, Beauty</option>
                                            <option value="household">Household</option>
                                            <option value="pet-care">Pet Care</option>
                                            <option value="office-equipment">Office Equipment</option>
                                            <option value="vehicle-equipment">Vehicle Equipment</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Date</label>
                                        <input type="date" class="form-control" name="shopping_date" placeholder="Shopping Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Item Name</label>
                                        <input type="text" class="form-control" name="item_name" placeholder="Item Name">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Item Category</label>
                                        <input type="text" class="form-control" name="item_category" placeholder="Item Category">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Item Description</label>
                                        <input type="text" class="form-control" name="item_description" placeholder="Item Description">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Item Quantity</label>
                                        <input type="text" class="form-control" name="item_qty" placeholder="Item Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Item Price</label>
                                        <input type="text" class="form-control" name="price" placeholder="Item Price">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Shopping Total Item Price</label>
                                        <input type="text" class="form-control" name="total_price" placeholder="Total Item Price">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Create Shopping Expenses</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</body>

</html>