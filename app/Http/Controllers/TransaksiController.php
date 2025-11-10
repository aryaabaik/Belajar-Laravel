<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Prodak;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with(['pelanggan', 'prodaks'])->latest()->get();
        return view('latihan.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $prodak    = Prodak::all();
        return view('latihan.transaksi.create', compact('pelanggan', 'prodak'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_prodak'    => 'required|array',
            'id_prodak.*'  => 'exists:prodaks,id',
            'jumlah'       => 'required|array',
            'jumlah.*'     => 'integer|min:1',
        ]);

        // Buat transaksi utama dulu
        $kode                      = 'TRX-' . strtoupper(uniqid());
        $transaksi                 = new Transaksi();
        $transaksi->kode_transaksi = $kode;
        $transaksi->id_pelanggan   = $request->id_pelanggan;
        $transaksi->tanggal        = now();
        $transaksi->total_harga    = 0;
        $transaksi->save();

        $totalHarga  = 0;
        $prodakPivot = [];

        foreach ($request->id_prodak as $index => $prodakId) {
            $prodak   = Prodak::findOrFail($prodakId);
            $jumlah   = $request->jumlah[$index];
            $subTotal = $prodak->harga * $jumlah;

            // isi array untuk attach pivot
            $prodakPivot[$prodakId] = [
                'jumlah'    => $jumlah,
                'sub_total' => $subTotal,
            ];

            // kurangi stok
            $prodak->stok -= $jumlah;
            $prodak->save();

            $totalHarga += $subTotal;
        }

        // simpan relasi prodak ke transaksi (many-to-many)
        $transaksi->prodaks()->attach($prodakPivot);

        // update total harga transaksi
        $transaksi->update(['total_harga' => $totalHarga]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['pelanggan', 'prodaks'])->findOrFail($id);
        return view('latihan.transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::with('prodaks')->findOrFail($id);
        $pelanggan = Pelanggan::all();
        $prodak    = Prodak::all();

        return view('latihan.transaksi.edit', compact('transaksi', 'pelanggan', 'prodak'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_prodak'    => 'required|array',
            'id_prodak.*'  => 'exists:prodaks,id',
            'jumlah'       => 'required|array',
            'jumlah.*'     => 'integer|min:1',
        ]);

        $transaksi = Transaksi::with('prodaks')->findOrFail($id);

        // Kembalikan stok prodak lama
        foreach ($transaksi->prodaks as $oldProdak) {
            $p = Prodak::find($oldProdak->id);
            if ($p) {
                $p->stok += $oldProdak->pivot->jumlah;
                $p->save();
            }
        }

        // kosongkan pivot lama
        $transaksi->prodaks()->detach();

        // update data transaksi
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->tanggal      = now();
        $transaksi->total_harga  = 0;
        $transaksi->save();

        $totalHarga  = 0;
        $prodakPivot = [];

        foreach ($request->id_prodak as $index => $prodakId) {
            $prodak   = Prodak::findOrFail($prodakId);
            $jumlah   = $request->jumlah[$index];
            $subTotal = $prodak->harga * $jumlah;

            $prodakPivot[$prodakId] = [
                'jumlah'    => $jumlah,
                'sub_total' => $subTotal,
            ];

            // kurangi stok baru
            $prodak->stok -= $jumlah;
            $prodak->save();

            $totalHarga += $subTotal;
        }

        // simpan relasi pivot baru
        $transaksi->prodaks()->attach($prodakPivot);

        // update total harga
        $transaksi->update(['total_harga' => $totalHarga]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::with('prodaks')->findOrFail($id);

        // Kembalikan stok prodak
        foreach ($transaksi->prodaks as $prodak) {
            $p = Prodak::find($prodak->id);
            if ($p) {
                $p->stok += $prodak->pivot->jumlah;
                $p->save();
            }
        }

        // Hapus relasi pivot
        $transaksi->produks()->detach();

        // Hapus transaksi utama
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan!');
    }

    public function search(Request $request)
    {
        $query     = $request->query('query');
        $transaksi = Transaksi::with('pelanggan')
            ->where('kode_transaksi', 'like', "%$query%")
            ->get();

        return response()->json($transaksi);
    }

}
