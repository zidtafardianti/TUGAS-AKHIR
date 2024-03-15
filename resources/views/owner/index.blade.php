@extends('owner.layouts.base')
   @section('content')
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>

                     @if(count($barangMasukHabis) > 0)
    <div class="alert alert-warning">
        <p>Peringatan: Ada barang masuk dengan stok yang hampir habis.</p>
        <ul>
            @foreach($barangMasukHabis as $barang)
                <li>{{ $barang->Nama_Barang }} (Stok: {{ $barang->Stock_Barang }})</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Tampilkan informasi lainnya di dashboard -->


                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-cloud-download green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{ $totalStockBarangMasuk }}</p>
                                    <p class="head_couter">Stock Barang Masuk</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-cloud-download green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">{{ $totalStockBarangKeluar }}</p>
                                    <p class="head_couter">Stock Barang Keluar</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     </div>
                    
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $('#dataTable').DataTable();
</script>
@endsection