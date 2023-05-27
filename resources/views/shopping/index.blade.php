<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shopping Expenses</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Shopping Expense</h1>
                    <p class="mb-4">Display information related to spending expenses by shopping category</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div>
                                <a href="{{ route('shopping.create') }}">
                                    <button type="button" class="btn btn-primary">Create Shopping Expenses</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Shopping Category</th>
                                            <th>Shopping Date</th>
                                            <th>Item Name</th>
                                            <th>Item Category</th>
                                            <th>Item Description</th>
                                            <th>Item Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->shopping->shopping_category }}</td>
                                            <td>{{ $item->shopping->shopping_date }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_category }}</td>
                                            <td>{{ $item->item_description }}</td>
                                            <td>{{ $item->item_qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>
                                                <a href="{{ route('shopping.edit', $item->shopping->shopping_code) }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" type="button" data-toggle="modal" data-id="{{ $item->shopping->shopping_code }}" data-target="#myModal" id="del" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', "#del", function(e) {
                e.preventDefault();
                var del = $(this).data('id');
                console.log(del)
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: `shopping/${del}`,
                                type: "DELETE",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    id: del
                                },
                                success: function() {
                                    swal({
                                        title: "Sweet!",
                                        text: "Delete data",
                                        imageUrl: 'thumbs-up.jpg'
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            });
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            });
        });
    </script>

</body>

</html>