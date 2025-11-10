<?php
namespace App\Http\Controllers;

use App\Models\Prodak;
use Illuminate\Http\Request;

class ProdakController extends Controller
{

    public function index()
    {
        $prodak = Prodak::latest()->paginate(5);
        return view('latihan.prodak.index', compact('prodak'));
    }

    public function create()
    {
        return view('latihan.prodak.create');
    }

    public function store(Request $request)
    {
        //validate form
        $validated = $request->validate([
            'nama_prodak' => 'required|min:5',
            'harga'       => 'required',
            'stok'        => 'required|',
        ]);

        $prodak              = new Prodak();
        $prodak->nama_prodak = $request->nama_prodak;
        $prodak->harga       = $request->harga;
        $prodak->stok        = $request->stok;
        // upload image
        // if ($request->hasFile('image')) {
        //     $file       = $request->file('image');
        //     $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        //     $path       = $file->storeAs('produks', $randomName, 'public');
        //     // memasukan nama_produk image nya ke database
        //     $produk->image = $path;
        // }

        $prodak->save();
        return redirect()->route('prodak.index');
    }

    public function show($id)
    {
        $prodak = Prodak::findOrFail($id);
        return view('latihan.prodak.show', compact('prodak'));
    }

    public function edit($id)
    {
        $prodak = Prodak::findOrFail($id);
        return view('latihan.prodak.edit', compact('prodak'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_prodak' => 'required|min:5',
            'harga'       => 'required',
            'stok'        => 'required|',
        ]);

        $prodak              = Produk::findOrFail($id);
        $prodak->nama_prodak = $request->nama_prodak;
        $prodak->harga       = $request->harga;
        $prodak->stok        = $request->stok;
        // if ($request->hasFile('image')) {
        //     // menghapus foto lama
        //     Storage::disk('public')->delete($produk->image);

        //     // upload foto baru
        //     $file       = $request->file('image');
        //     $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        //     $path       = $file->storeAs('produks', $randomName, 'public');
        //     // memasukan nama_produk image nya ke database
        //     $produk->image = $path;
        // }
        $prodak->save();
        return redirect()->route('prodak.index');

    }

    public function destroy($id)
    {
        $prodak = Prodak::findOrFail($id);
        // Storage::disk('public')->delete($prodak->image);
        $prodak->delete();
        return redirect()->route('prodak.index');

    }
}
