<!--Header File Included Here-->@include('header')
<body id="page-top"><!-- Page Wrapper -->
<div id="wrapper"><!--Sidebar Included Here-->@include('sidebar') <!--Sidebar Included Here--><!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"><!-- Main Content -->
        <div id="content"><!-- Begin Page Content -->
            <div class="container-fluid"><!--Session Message-->@if(session('info'))
                    <div class="alert alert-dismissible alert-success">{{session('info')}}</div> @endif
                <script> $('div.alert').delay(1500).slideUp(300);</script><!--Session Message-->
                <!--Error Message-->@if (count($errors))
                    <div class="alert alert-dismissible alert-danger">@foreach ($errors->all() as $error)
                            <li>{{$error}}</li> @endforeach</div> @endif
                <script> $('div.alert').delay(1500).slideUp(300);</script><!--Error Message-->
                <div class="row"><!-- Area Chart -->
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4"><!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6
                                        class="m-0 font-weight-bold text-primary">Add Category</h6></div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <form method="post" action="{{url('/addCategory')}}">{{csrf_field()}}
                                    <fieldset>
                                        <div class="form-group"><label for="exampleInputEmail1">ID :</label><input
                                                    type="text" name="id" class="form-control" id="id"
                                                    placeholder="Enter ID"></div>
                                        <div class="form-group"><label for="exampleInputEmail1">Category :</label><input
                                                    type="text" name="category" class="form-control" id="category"
                                                    placeholder="Enter New Category"></div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div><!-- Manage Category-->
                        <div class="row">
                            <div class="col-xl-12 col-lg-7">
                                <div class="card shadow mb-4"><!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Manage Categories</h6></div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>@if(count($categories) > 0) @foreach($categories->all() as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->category}}</td>
                                                    <td><a href='{{url("/deleteCategory/{$category->id}")}}'
                                                           class="btn btn-sm btn-danger">Delete</a></td>
                                                </tr> @endforeach @endif</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid --></div><!-- End of Main Content --><!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto"><span>Copyright &copy; ITPM PROJECT 2019</span></div>
                </div>
            </footer><!-- End of Footer --></div><!-- End of Content Wrapper --></div><!-- End of Page Wrapper -->
    <!-- Scroll to Top Button--><a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</body></html>
