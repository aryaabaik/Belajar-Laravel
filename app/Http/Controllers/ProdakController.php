<?php
namespace App\Http\Controllers;

use App\Models\Prodak;
use Illuminate\Http\Request;

class ProdakController extends Controller
{
    public function index()
    {
        $prodak = Prodak::latest()->paginate(5);
        return view('prodak.index', compact('prodak'));
    }

    public function create()
    {
        return view('prodak.create');
    }

    public function store(Request $request)
    {
        //validate form
        $validated = $request->validate([
            'nama_prodak' => 'required|min:5',
            'harga'       => 'required',
            'stok'        => 'required',
        ]);

        $prodak              = new Prodak();
        $prodak->nama_prodak = $request->nama_prodak;
        $prodak->harga       = $request->harga;
        $prodak->stok        = $request->stok;
        $prodak->save();
        return redirect()->route('prodak.index');
    }

    public function show($id)
    {
        $prodak = Prodak::findOrFail($id);
        return view('prodak.show', compact('prodak'));
    }

    public function edit($id)
    {
        $prodak = Prodak::findOrFail($id);
        return view('prodak.edit', compact('prodak'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|min:5',
            'harga'       => 'required',
            'stok'        => 'required|min:10',
        ]);

        $prodak              = Prodak::findOrFail($id);
        $prodak->nama_prodak = $request->nama_prodak;
        $prodak->harga       = $request->harga;
        $prodak->stok        = $request->stok;

        $prodak->save();
        return redirect()->route('prodak.index');

    }

    public function destroy($id)
    {
        $prodak = Prodak::findOrFail($id);
        $prodak->delete();
        return redirect()->route('prodak.index');

    }
}
