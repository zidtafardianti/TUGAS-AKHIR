@php
    use App\Models\Karyawan;

    $karyawan = Karyawan::where('id_users', Auth::user()->id)->first();
@endphp

<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar_user_info">
          <div class="icon_setting"></div>
          <div class="user_profle_side">
              <div class="user_img" style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%;">
                  <img class="img-responsive" src="{{ asset('storage/Foto/'.$karyawan->Foto) }}" alt="Foto" style="width: 100%; height: 100%; object-fit: cover;">
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
                        <a href="{{route('pegawai.dashboard')}}" aria-expanded="false"><i class="fa fa-dashboard purple_color2"></i> <span>Dashboard</span></a>
                     </li>
                     <li>
                        <a href="{{route('pegawai.tabelBarangMasuk')}}" aria-expanded="false"><i class="fa fa-briefcase purple_color2"></i> <span>Barang Masuk</span></a>
                     </li>
                     <li>
                        <a href="{{route('pegawai.tabelBarangKeluar')}}" aria-expanded="false"><i class="fa fa-briefcase blue1_color"></i> <span>Barang Keluar</span></a>
                     </li>
                     <li class="active">
                  </ul>
    </div>
</nav>