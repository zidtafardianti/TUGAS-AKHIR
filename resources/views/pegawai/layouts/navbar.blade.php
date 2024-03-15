@php
    use App\Models\Karyawan;

    $karyawan = Karyawan::where('id_users', Auth::user()->id)->first();
@endphp

<div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
          <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
          <div class="right_topbar">
              <div class="icon_info">
                  <ul class="user_profile_dd">
                      <li>
                          <a class="dropdown-toggle" data-toggle="dropdown">
                           <div style="display: flex; align-items: center;">
                              <div style="width: 45px; height: 45px; overflow: hidden; border-radius: 50%; background-color: #fff;">
                                  <img class="img-responsive" src="{{ asset('storage/Foto/'.$karyawan->Foto) }}" alt="Foto" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                              </div>
                              <span class="name_user">{{ $karyawan->Nama }}</span>
                          </div>                                                    
                          </a>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('pegawai.showprofile')}}">My Profile</a>
                              <a class="dropdown-item" href="{{route('pegawai.logout')}}" onclick="showLogoutConfirmation();"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>  
</div>

<script>
   function showLogoutConfirmation() {
       Swal.fire({
           title: 'Konfirmasi Logout',
           text: 'Apakah Anda yakin ingin logout?',
           icon: 'question',
           showCancelButton: true,
           confirmButtonText: 'Ya, Logout',
           cancelButtonText: 'Batal'
       }).then((result) => {
           if (result.isConfirmed) {
               // Redirect ke route logout jika pengguna mengonfirmasi logout
               window.location.href = "{{ route('pegawai.logout') }}";
           }
       });
   }
</script>