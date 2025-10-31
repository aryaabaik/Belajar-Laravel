<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {

        $pelanggans = Pelanggan::all();
        return view('transaksi.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'kode_transaksi' => 'required|unique:transaksis',
                'tanggal'        => 'required|date',
                'id_pelanggan'   => 'required|exists:pelanggans,id',
                'total_harga'    => 'required|numeric',
            ]
        );

        $transaksi                 = new Transaksi();
        $transaksi->kode_transaksi = $request->kode_transaksi;
        $transaksi->tanggal        = $request->tanggal;
        $transaksi->id_pelanggan   = $request->id_pelanggan;
        $transaksi->total_harga    = $request->total_harga;
        $transaksi->save();
        //atach (menampilkan banyak data)
        $transaksi->pelanggans()->attach($request->id_pelanggan);
        return redirect()->route('transaksi.index');
    }

    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggan = Pelanggan::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggan'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate(
            [
                'kode_transaksi' => 'required',
                'tanggal'        => 'required|date',
                'id_pelanggan'   => 'required|exists:pelanggans,id',
                'total_harga'    => 'required|numeric',
            ]
        );

        $transaksi                 = Transaksi::findOrFail($id);
        $transaksi->kode_transaksi = $request->kode_transaksi;
        $transaksi->tanggal        = $request->tanggal;
        $transaksi->id_pelanggan   = $request->id_pelanggan;
        $transaksi->total_harga    = $request->total_harga;
        $transaksi->save();
        // sync (memperbarui data yang di ubah dar many to many)
        $transaksi->pelanggans()->sync($request->id_pelanggan);
        return redirect()->route('transaksi.index');
    }

    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        //menghapus data yang terkait dari transaksi dan pelanggan
        $transaksi->pelanggans()->detach();
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
