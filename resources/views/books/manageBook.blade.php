<!--Header File Included Here-->@include('header')
<body id="page-top"><!-- Page Wrapper -->
<div id="wrapper"><!--Sidebar Included Here-->@include('sidebar') <!--Sidebar Included Here--><!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"><!-- Main Content -->
        <div id="content"><!-- Begin Page Content -->
            <div class="container-fluid"><!--Session Message-->@if(session('info'))
                    <div class="alert alert-dismissible alert-success">{{session('info')}}</div> @elseif(session('error'))
                    <div class="alert alert-dismissible alert-danger">{{session('error')}}</div> @endif
                <script> $('div.alert').delay(1500).slideUp(300);</script>
                <script>
                    $('document').ready(function() {

                        $('.search').keyup(function(){
                            var search=$(this).val();
                            if(search == "") {
                                $( ".success" ).html("<b>Student information will be listed here...</b>");
                            }else {
                                $.get( "{{ url('/livesearch?registration_no=') }}"+search,
                                    function(data){
                                        $('.success').html(data);
                                    });
                            }
                        });
                    });
                </script><!--Session Message--><!-- Manage Category-->
                <form action="livesearch" method="get" role="form" class="form-horizontal form-material">
                    @csrf

                    <div class="form-group">
                        <div class="col-md-4">
                            <input required type="text" name="search" class="form-control search" placeholder="Search Books" autofocus>
                        </div>
                    </div>

                </form>

                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4"><!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6
                                        class="m-0 font-weight-bold text-primary">Manage Books</h6></div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>No of Copies</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>@if(count($books) > 0) @foreach($books->all() as $book)
                                        <tr>
                                            <td>{{$book->ISBN_code}}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->author}}</td>
                                            <td>{{$book->category}}</td>
                                            <td>{{$book->noOfCopies}}</td>
                                            <td><a href='{{url("/updateBook/{$book->ISBN_code}")}}'
                                                   class="btn btn-sm btn-warning">Update</a> &nbsp;<a
                                                        href='{{url("/deleteBook/{$book->ISBN_code}")}}'
                                                        class="btn btn-sm btn-danger">Delete</a></td>
                                        </tr> @endforeach @endif</tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.container-fluid --></div><!-- End of Main Content --></div>
            <!-- End of Content Wrapper --></div><!-- End of Page Wrapper --><!-- Scroll to Top Button--><a
                class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
</body></html>
