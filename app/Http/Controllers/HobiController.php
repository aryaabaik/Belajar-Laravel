<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobi;
use Storage;
use Str;

class HobiController extends Controller
{
    public function index()
    {
        $hobi = Hobi::latest()->paginate(5);
        return view('hobi.index', compact('hobi'));
    }

    public function create()
    {
        return view('hobi.create');

        

    }

    public function store(Request $request)
    {
        //validate form
        $validated = $request->validate([
            ' nama_hobi'      => 'required|min:5',
        ]);

      

        $hobi            = new Hobi();
        $hobi->nama_hobi      = $request->nama_hobi;

        $hobi->save();
        return redirect()->route('hobi.index');
    }

    public function show($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.show', compact('hobi'));
    }

    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));

        $hobi->save();
return redirect()->route('hobi.index');

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            ' nama_hobi'      => 'required|min:5',
        ]);

        $hobi            = Hobi::findOrFail($id);
        $hobi-> nama_hobi      = $request-> nama_hobi;
       


        $hobi->save();
        return redirect()->route('hobi.index');

    }

    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();
        return redirect()->route('hobi.index');

    }
}
