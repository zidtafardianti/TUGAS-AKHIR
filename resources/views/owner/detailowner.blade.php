@extends('owner.layouts.base')
@section('title', 'Detailowner')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="page_title">
           <h2>Detail Data owner</h2>
        </div>
     </div>

</div>
<div class="row column1">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Profil owner</h2>
                    </div>
                </div>
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <!-- user profile section --> 
                        <!-- profile image -->
                        <div class="col-lg-12">
                        <div class="full dis_flex center_text">
                            <div class="profile_img">
                                <img src="{{ asset('storage/Foto/'.$profil->Foto) }}" style="width: 140px; height: 140px; object-fit: cover; border-radius: 50%;" alt="Ini foto">
                            </div
                            <div class="profile_contant">
                                <div class="contact_inner">
                                    <h3>{{$profil->Nama}}</h3>
                                    <!--tabel biodata-->
                                    <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>NIK</td>
                                                <td>{{$profil->NIK}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td>{{$profil->Tempat_Lahir}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>{{$profil->Tanggal_Lahir}}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>{{$profil->Agama}}</td>
                                            </tr> 
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>{{$profil->Jenis_Kelamin}}</td>
                                            </tr>        
                                            <tr>
                                                <td>Alamat</td>
                                                <td>{{$profil->Alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td>{{$profil->No_HP}}</td>
                                            </tr>
                                           
                                            <tr>
                                                <td>role</td>
                                                <td>{{$profil->role}}</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>

                                    <!--tabel biodata-->
                                    <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <a href="{{route('owner.editowner', $profil->id)}}" class="btn main_bt">Edit</a>
                                    {{-- <a href="{{route('admin.tabeladmin')}}" class="btn main_bt">Tutup</a> --}}
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- profile contant section -->
                        <!-- end user profile section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end row -->
 </div>

@endsection