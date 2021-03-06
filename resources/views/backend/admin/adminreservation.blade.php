<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('backend.admin.partials.admincss')
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="#"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('backend.admin.partials.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="col-xl-12 col-sm-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Guest</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Message</th>
                      {{-- <th>Action</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reservation as $reservations )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $reservations->name }}</td>
                      <td>{{ $reservations->email }}</td>
                      <td>{{ $reservations->phone }}</td>
                      <td>{{ $reservations->guest }}</td>
                      <td>{{ $reservations->date }}</td>
                      <td>{{ $reservations->time }}</td>
                      <td>{{ $reservations->message }}</td>
                      {{-- <td>
                        <a class="btn btn-success" style="float: left; transform: translateX(-10px);" 
                        href="{{ route('admin.foodmenu.edit',[$reservations->id]) }}">Edit</a>
                          <div>
                            <form method="POST" action="{{ url('admin.foodmenu.delete', [$reservations->id]) }}">
                              @csrf
                              <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                          </div>
                      </td> --}}
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ?? bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('backend.admin.partials.adminscripts')
    <!-- End custom js for this page -->
  </body>
</html>