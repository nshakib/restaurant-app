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
            <div class="row">
              <div class="col-xl-12 col-sm-12">
                    <div>
                        <form action="{{ route('admin.checf_upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id=""  placeholder="Name">
                              </div>
                              <div class="mb-3">
                                <label for="speciality" class="form-label">Speciality</label>
                                <input type="text" class="form-control" name="speciality" id=""  placeholder="Speciality">
                              </div>
                              <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id=""  placeholder="image">
                              </div>
      
                              <button type="submit" class="btn btn-outline-success">Save</button>
                        </form>
                    </div>
              </div>
              <div class="pt-5"></div>
              <div class="col-xl-12 col-sm-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Speciality</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($checf as $checfs )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $checfs->name }}</td>
                      <td>{{ $checfs->speciality }}</td>
                      <td><img height="200" width="200" src="/checfimage/{{ $checfs->image }}" alt=""></td>
                      
                      <td>
                        <a class="btn btn-success" style="float: left; transform: translateX(-10px);" 
                        href="{{ route('admin.checf_edit',[$checfs->id]) }}">Edit</a>
                          <div>
                            <form method="POST" action="{{ route('admin.checf_delete', [$checfs->id]) }}">
                              @csrf
                              <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                          </div>
                      </td>
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
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
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