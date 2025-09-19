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
            <h1>{{$nama}}</h1>
        </center>
        @foreach ($data as $siswa)
        Nama : {{ $siswa['nama'] }} <br>
        Harga : {{ $siswa['nilai'] }} <br>
        @endforeach

        @if($nila)
            
        @endif
        <a href="/">Kembali Ke Menu</a>
    </fieldset>
</body>
</html>
