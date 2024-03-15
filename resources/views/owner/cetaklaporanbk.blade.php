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
    <h2>Daftar Barang Keluar</h2>
    <table>
        <thead class="thead-dark">
            <tr>
                <th>Id Keluar</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <tH>Satuan</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangkeluar as $barangkeluar)
            <tr>
               <td>{{ $barangkeluar->id }}</td>
               <td>{{ $barangkeluar->barangmasuk->Nama_Barang }}</td>
               <td>{{ $barangkeluar->Jumlah }}</td>
               <td>{{ $barangkeluar->Satuan }}</td>
               <td>{{ $barangkeluar->Tanggal_Keluar }}</td>
            </tr>
            @endforeach
         </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
