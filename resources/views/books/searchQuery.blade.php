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
<body id="page-top" onload="makeTableScroll(); make2TableScroll();"><!-- Page Wrapper -->

<div id="content-wrapper" class="d-flex flex-column"><!-- Main Content -->
    <div id="content"><!-- Begin Page Content -->
        <div class="container-fluid"><!--Session Message-->@if(session('info'))
                <div class="alert alert-dismissible alert-success">{{session('info')}}</div> @elseif(session('error'))
                <div class="alert alert-dismissible alert-danger">{{session('error')}}</div> @endif
            <script> $('div.alert').delay(1500).slideUp(300);</script><!--Session Message--><!-- Manage Category-->
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4"><!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6
                                    class="elements_title">Search Result</h6></div>

                        <br> <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">

                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif

                                    <h3 class="box-title">Search Book</h3>

                                    <form action="searchBook" method="get" role="form" class="form-horizontal form-material">
                                        @csrf

                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input required type="text" name="search" class="form-control form-control-line">
                                            </div>
                                            <div class='col-md-2 col-md-offset-1'>
                                                <button class="btn btn-info" type="submit"><i class='fa fa-search'></i> Search</button>
                                            </div>
                                        </div>

                                    </form>

                                    @if($anyData)
                                        <h2>
                                            {{count($books)}} results found for `{{$term}}`
                                        </h2>


                                        @if(count($books)>0)

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Author</th>
                                                        <th>Edition</th>
                                                        <th>Available Copies</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($books as $b)
                                                        <tr>
                                                            <td>{{$b->title}}    </td>
                                                            <td>{{$b->author}}</td>
                                                            <td>{{$b->edition}}</td>
                                                            <td>{{$b->noOfCopies}}</td>
                                                            <td>
                                                                <a href='{{url('/requestBook/'.$b->ISBN_code.'/')}}'
                                                                   class="solid_btn">Borrow Book</a> &nbsp;

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                                @endif
                                                @endif

                                            </div>
                                </div>
                            </div>
                        </div>