<?php
namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Request;

class KucingController extends Controller
{
    // Menampilkan semua kucing 😺
    public function index()
    {
        $kucing = Kucing::all();
        return view('kucing.index', compact('kucing'));
    }

    // Form tambah kucing baru 🍼
    public function create()
    {
        return view('kucing.create');
    }

    // Simpan kucing ke database 🍣
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'warna' => 'required',
            'umur'  => 'required|numeric',
            'suara' => 'required',
        ]);

        Kucing::create($request->all());
        return redirect()->route('kucing.index')->with('success', 'Kucing baru berhasil diadopsi! 😻');
    }

    // Lihat detail kucing 🧐
    public function show(Kucing $kucing)
    {
        return view('kucing.show', compact('kucing'));
    }

    // Form edit kucing ✏️
    public function edit(Kucing $kucing)
    {
        return view('kucing.edit', compact('kucing'));
    }

    // Update data kucing 💅
    public function update(Request $request, Kucing $kucing)
    {
        $request->validate([
            'nama'  => 'required',
            'warna' => 'required',
            'umur'  => 'required|numeric',
            'suara' => 'required',
        ]);

        $kucing->update($request->all());
        return redirect()->route('kucing.index')->with('success', 'Data kucing diperbarui, sekarang dia makin lucu! 😽');
    }

    // Hapus kucing 😢
    public function destroy(Kucing $kucing)
    {
        $kucing->delete();
        return redirect()->route('kucing.index')->with('success', 'Kucing sudah pergi ke rumah baru 🏡');
    }
}
