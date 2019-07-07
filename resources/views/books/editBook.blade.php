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
                                        class="m-0 font-weight-bold text-primary">Update Books</h6></div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <form method="post"
                                      action="{{url('/manageBooks/update', array($books->ISBN_code))}}">{{csrf_field()}}
                                    <fieldset>
                                        <div class="form-group"><label for="exampleInputEmail1">ISBN_code:</label><input
                                                    type="text" name="ISBN_code" class="form-control" id="ISBN_code"
                                                    value="<?php echo $books->ISBN_code?>"></div>
                                        <div class="form-group"><label for="exampleInputEmail1">Title :</label><input
                                                    type="text" name="title" class="form-control" id="title"
                                                    value="<?php echo $books->title?>"></div>
                                        <div class="form-group"><label for="exampleInputEmail1">Edition :</label><input
                                                    type="text" name="edition" class="form-control" id="title"
                                                    value="<?php echo $books->edition?>"></div>
                                        <div class="form-group"><label for="exampleInputEmail1">Author :</label><input
                                                    type="text" name="author" class="form-control" id="author"
                                                    value="<?php echo $books->author?>"></div><!--DIV-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="category"><span class="FieldInfo">Category:</span></label><select
                                                            class="form-control" id="category"
                                                            name="category">@if(count($categories) > 0) @foreach($categories as $category)
                                                            <option value="{{$category->category}}">{{$category->category}}</option> @endforeach @endif
                                                    </select></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label for="exampleInputEmail1">No Of Copies
                                                        :</label><input type="text" name="noOfCopy" class="form-control"
                                                                        id="noOfCopy"
                                                                        value="<?php echo $books->noOfCopies?>"></div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div><!-- Content Row -->
                    <div class="row"><!-- Content Column -->
                        <div class="col-lg-6 mb-4"></div>
                    </div>
                </div><!-- /.container-fluid --></div><!-- End of Main Content --><!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto"><span>Copyright &copy; ITPM PROJECT 2019</span></div>
                </div>
            </footer><!-- End of Footer --></div><!-- End of Content Wrapper --></div><!-- End of Page Wrapper -->
    <!-- Scroll to Top Button--><a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</body>
</html>
