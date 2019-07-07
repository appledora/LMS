<!--Header File Included Here-->
@include('header')
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
@include('sidebar')
<!--Sidebar Included Here-->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!--Session Message-->
                @if(session('info'))
                    <div class="alert alert-dismissible alert-success">
                        {{session('info')}}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-dismissible alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <script>
                    $('div.alert').delay(1500).slideUp(300);
                </script>
                <!--Session Message-->


                <!-- Manage Category-->

                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Manage Accepted Requests</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Student ID</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($accepted) > 0)
                                        @foreach($accepted->all() as $accept)
                                            <tr>
                                                <td>{{$accept->ISBN_code}}</td>
                                                <td>{{$accept->reg_no}}</td>
                                                <td>{{$accept->issue_date}}</td>
                                                <td>{{$accept->return_date}}</td>
                                                <td>
                                                    <a href='{{url('/manageBooks/returnedBook/'.$accept->reg_no.'/'.$accept->ISBN_code)}}'
                                                       class="btn btn-sm btn-warning">Returned</a> &nbsp;
                                                    {{--
                                                                                                        <a href='{{url("/deleteBook/{$book->id}")}}' class="btn btn-sm btn-danger">Delete</a>
                                                    --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
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

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</div>
</body>
</html>
