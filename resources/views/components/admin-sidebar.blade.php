<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admin/img/crop_picture_1718932297.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Chuckels</h1>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li><a href="/home"> <i class="icon-home"></i>Home </a></li>
              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-home"></i>Kamar Hotel</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                  <li><a href="{{ url('data_kamar') }}">Daftar Kamar</a></li>
                  <li><a href="{{ url('create_kamar') }}">Tambah Kamar</a></li>
                </ul>
              </li>
              <li><a href="{{ url('booked_kamar') }}"><i class="icon-home"></i>Daftar Booking Kamar </a></li>
      </ul>
    </nav>
    <!-- Sidebar Navigation end-->
