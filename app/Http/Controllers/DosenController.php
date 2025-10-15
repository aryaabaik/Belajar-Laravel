<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Storage;
use Str;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::latest()->paginate(5);
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');

    }

    public function store(Request $request)
    {
        //validate form
        $validated = $request->validate([
            'nama'      => 'required|min:5',
            'nipd'     => 'required',
        ]);

        $dosen            = new Dosen();
        $dosen->nama      = $request->nama;
        $dosen->nipd     = $request->nipd;

        $dosen->save();
        return redirect()->route('dosen.index');
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.show', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'      => 'required|min:5',
            'harga'     => 'required',
        ]);

        $dosen            = Dosen::findOrFail($id);
        $dosen->nama      = $request->nama;
        $dosen->harga     = $request->nipd;


        $dosen->save();
        return redirect()->route('dosen.index');

    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index');

    }
}


