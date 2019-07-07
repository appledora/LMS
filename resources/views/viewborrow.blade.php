<!--Header File Included Here-->
@include('header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <!--Sidebar Included Here-->
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

       
        <!--Session Message-->

              
            <!-- Manage Category-->

           

             <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Borrow Details</h6>
                <div class="col-auto">
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                 <!-- member Search -->
                 <form class="form-inline my-2 my-lg-0">
                    </form>
                    <!-- divider -->
                    <div class="dropdown-divider"></div>
                    <div class="scrollingTable" >
                    <table id="myTable3" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Borrow ID</th>
                            <th>Book ID</th>
                            <th>Member ID</th>
                            <th>Borrowed At</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($borrows) > 0)
                      @foreach($borrows->all() as $borrow)
                      <tr>
                          <td>{{$borrow->id}}</td>
                          <td>{{$borrow->bid}}</td>                                                  
                          <td>{{$borrow->mid}}</td>                                                  
                          <td>{{$borrow->borrowed_at}}</td>                                                  
                          <td>{{$borrow->due_date}}</td>                                                  
                         <!--  <td>          
                              <a href='{{url("/updateBorrow/{$borrow->id}")}}' class="btn btn-sm btn-warning">Update</a> &nbsp;       
                              <a href='{{url("/deleteBorrow/{$borrow->id}")}}' class="btn btn-sm btn-danger">Delete</a>                              
                          </td> -->
                      </tr>
                      @endforeach
                  @endif
                  </tbody>
                </table>
                </div>
                </div>
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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
 <script>
          $('div.alert').delay(2000).slideUp(300);
        </script>