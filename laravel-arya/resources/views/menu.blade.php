<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><fieldset>
    <center><h1>{{$resto}}</h1></center>
    @foreach ($data as $makanan)
        Nama : {{ $makanan['nama_makanan'] }} <br>
        Harga : {{ $makanan['harga'] }} <br>
        Jumlah : {{ $makanan['jumlah'] }} <br>
        @php
            $total = $makanan['jumlah'] * $makanan['harga']; @endphp  
        Total : {{ $total }} <br><br>
    @endforeach
    <a href="/">Kembali Ke Menu</a>
</fieldset>
</body>
</html>