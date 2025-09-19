<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <fieldset>
       <center>
           <h1>{{$toko}}</h1>
       </center>
       @foreach ($data as $alat_tulis)
       Nama : {{ $alat_tulis['nama_barang'] }} <br>
       Harga : {{ $alat_tulis['harga'] }} <br>
       Jumlah : {{ $alat_tulis['jumlah'] }} <br>
       @php
       $total = $alat_tulis['jumlah'] * $alat_tulis['harga']; @endphp
       Total : {{ $total }} <br><br>
       @endforeach
     
   </fieldset>

</body>
</html>