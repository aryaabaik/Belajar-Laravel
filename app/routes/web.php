<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//basic 
Route::get('about', function(){
return '<h1>Hallo </h1>' . 
'<br> Selamat Datang Di Perpustakaan Digital'; 
});


//perkenalan
Route::get('hai', function(){
return '<h1>Perkenalan </h1>' . 
'<br> Nama Saya Arya Adhitya.' . '<br>Saya Kelas XI RPL 3' . '<br>Saya Sekolah Di SMK ASSALAAM BANDUNG'
 . '<br>Alamat Saya Jln.Terusan Cibaduyut GG.Situtarate'; 
});

//buku
Route::get('buku', function(){
return view('buku'); 
});


Route::get('menu', function(){
 $data = [
    ['nama_makanan'=>'Bala-Bala', 'harga'=>1000, 'jumlah'=>10],
    ['nama_makanan'=>'Gehu Pedas', 'harga'=>2000, 'jumlah'=>15],
    ['nama_makanan'=>'Cireng Isi Ayam', 'harga'=>2500, 'jumlah'=>5],
 ];
 $resto = "Resto MPL - Makanan Penuh Lemak";

 return view('menu', compact('data', 'resto'));
});

//route Parameter (Nilai)
Route::get('books/{judul}', function($a){
    return '<h2>Judul Buku : '  . $a;
});


Route::get('post/{tittle}/{category}', function($a, $b){
    //compact asosiatif
    return view('post', ['judul'=>$a, 'cat'=>$b]);
});

//Route Optional Parameter 
// Ditandai Dengan ?
Route::get('profile/{nama?}', function($a = "guest"){
    return 'Halo Nama Saya' . $a;
});

Route::get('order/{item?}', function($a = "nasi"){
        return view('order', compact('a'));
});

//Tugas Latihan

//1.
Route::get('toko', function () {
    $data = [
        ['nama_barang' => 'Buku', 'harga' => 15000, 'jumlah' => 2],
        ['nama_barang' => 'Pensil', 'harga' => 3000, 'jumlah' => 5],
        ['nama_barang' => 'Penggaris', 'harga' => 7000, 'jumlah' => 1],
    ];
    $toko = "Toko Alat Tulis";

    return view('toko', compact('data', 'toko'));
});

//2.
Route::get('kelulusan/{nama?}/{mapel?}/{lulus?}', function($a = "Tidak Ada Nilai", $b = "Tidak Ada Nilai", $c = "Tidak Ada Nilai") {
    return view('kelulusan', compact('a', 'b', 'c'));
});

//3. 
Route::get('grading/{nama?}/{nilai?}', function($a = "Tidak Ada Nilai", $b = "Tidak Ada Nilai") {
    return view('grading', compact('a', 'b',));
});

//4.
Route::get('status', function () {
    $data = [
        ['nama' => 'Andi', 'nilai' => 85],
        ['nama' => 'Budi', 'nilai' => 70],
        ['nama' => 'Citra', 'nilai' => 95],
    ];

    return view('status', compact('data'));
});

//tes model 
Route::get('tes-model', function() {
    $model = App\Models\Kendaraan::all();
    return $model;
});

Route::post('create-data-Kendaraan', function(){
    $model = App\Models\Kendaraan::create([

        'Merk' => 'Yamaha',
        'Jenis_Kendaraan' => 'Aerox 155'
    ]);
    return $model;
});