<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <b>
            <center>Nilai Kelulusan Siswa</center><br>
            Nama Siswa : {{ $a }} <br>
            Mata Pelajaran : {{ $b }} <br>
            Nilai : {{ $c }} <br>

            @if($c > 75)
            Keterangan : Siswa Lulus
            @else
            Keterangan : Siswa Tidak Lulus
            @endif
        </b>
    </fieldset>
</body>
</html>
