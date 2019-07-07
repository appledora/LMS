<!--Header File Included Here-->@include('header')
<header class="navbar-header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item "><a class="nav-link" href="student_home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>

        </ul>
    </div>
</nav>
</header>
<body id="page-top"><!-- Page Wrapper -->
<div id="wrapper"><!--Sidebar Included Here--><!--Sidebar Included Here--><!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"><!-- Main Content -->
        <div id="content"><!-- Begin Page Content -->
            <div class="container-fluid"><!--Session Message-->@if(session('info'))
                    <div class="alert alert-dismissible alert-success">{{session('info')}}</div> @elseif(session('error'))
                    <div class="alert alert-dismissible alert-danger">{{session('error')}}</div> @endif
                <script> $('div.alert').delay(1500).slideUp(300);</script><!--Session Message--><!-- Manage Category-->
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4"><!-- Card Header - Dropdown -->
                           <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> <h3 class="elements_title">Borrow History</h3></div>

                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>{{-- <th>No of Copies</th> <th>Action</th>--}}</tr>
                                    </thead>
                                    <tbody>@if(count($borrows) > 0) @foreach($borrows->all() as $borrow)
                                        <tr>
                                            <td>{{$borrow->ISBN_code}}</td>
                                            <td>{{$borrow->issue_date}}</td>
                                            <td>{{$borrow->return_date}}</td>
                                        </tr> @endforeach @endif</tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.container-fluid --></div><!-- End of Main Content --></div>
            <!-- End of Content Wrapper --></div><!-- End of Page Wrapper --><!-- Scroll to Top Button--><a
                class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
</div>
</body></html>
