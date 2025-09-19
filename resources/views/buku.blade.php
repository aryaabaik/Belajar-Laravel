<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $nama = "Arya"; ?>
    <h1> Ini Halaman Buku </h1>
    <h2>Nama Saya : <?php $nama; ?></h2>
    <br>
   @php $now = Date('d M Y') @endphp
   <h3>Hari Ini Tanggal {{$now}}</h3> 
</body>
</html>