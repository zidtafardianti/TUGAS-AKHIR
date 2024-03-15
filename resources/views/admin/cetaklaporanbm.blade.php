<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang Masuk</title>
    <style>
        /* Tambahkan styling sesuai kebutuhan Anda */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Daftar Barang Masuk</h2>
    <table class="table" id="dataTable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id Barang</th>
           <th scope="col">Nama Barang</th>
           <th scope="col">Kode Barang</th>
           <th scope="col">Merk</th>
           <th scope="col">Satuan</th>
           <th scope="col">Jumlah</th>
           <th scope="col">Tanggal Masuk</th>
           <th scope="col">Stock Barang</th>
            </tr>
        </thead>

        <tbody>
            @foreach($barangmasuk as $barangmasuk)
            <tr>
            <td>{{$barangmasuk->id}}</td>
            <td>{{ $barangmasuk->Nama_Barang }}</td>
            <td>{{ $barangmasuk->Kode_Barang }}</td>
            <td>{{ $barangmasuk->Merk }}</td>
            <td>{{ $barangmasuk->Satuan }}</td>
            <td>{{ $barangmasuk->Jumlah }}</td>
            <td>{{ $barangmasuk->Tanggal_Masuk }}</td>
            <td>{{ $barangmasuk->Stock_Barang }}</td>
            </tr>
            @endforeach
         </tbody>
   </table>
</body>

</html>

@section('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
  $('#dataTable').DataTable();
</script>
@endsection
