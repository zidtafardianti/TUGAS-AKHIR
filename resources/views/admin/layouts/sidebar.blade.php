@php
    use App\Models\Karyawan;

    $karyawan = Karyawan::where('id_users', Auth::user()->id)->first();
@endphp

<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar_user_info">
          <div class="icon_setting"></div>
          <div class="user_profle_side">
              <div class="circle-container">
                  <img class="img-responsive rounded-circle" src="{{ asset('storage/Foto/'.$karyawan->Foto) }}" alt="Foto">
              </div>
              <div class="user_info">
                  <h6></h6>
                  <p><span class="online_animation"></span> Online</p>
              </div>
          </div>
      </div>
  </div>
  
    <div class="sidebar_blog_2">
    <ul class="list-unstyled components">
                     <li class="active">
                        <a href="{{route('admin.dashboard')}}" aria-expanded="false"><i class="fa fa-dashboard purple_color2"></i> <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="{{route('admin.tabelowner')}}" aria-expanded="false"><i class="fa fa-briefcase blue1_color"></i> <span>Data Pengguna</span></a>
                     </li>
                     <li>
                        <a href="{{route('admin.barang_masuk')}}" aria-expanded="false"><i class="fa fa-briefcase purple_color2"></i> <span>Barang Masuk</span></a>
                     </li>
                     <li>
                        <a href="{{route('admin.barang_keluar')}}" aria-expanded="false"><i class="fa fa-briefcase blue1_color"></i> <span>Barang Keluar</span></a>
                     </li>
                     <li class="active">
                  </ul>
    </div>
</nav>