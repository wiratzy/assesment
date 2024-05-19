<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Menu Tambah Data";
        $data = Makanan::all();
        return view('makanan.index', compact('data', 'title'));
    }

    public function create()
    {
        $title = "Tambah Data";
        return view('makanan.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_makanan' => 'required|max:255',
            'harga' => 'required',
            'gambar' => 'required|image',
        ]);
        if ($request->file('gambar')) {
            $image = $request->file('gambar');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./daftar-gambar/', $nameImage);
            $validatedData['gambar'] = $nameImage;
        }
        Makanan::create($validatedData);
        return redirect('makanan/index')->with('success', 'Data baru telah ditambahkan');
    }


    public function edit(Makanan $makanan)
    {
    // dd($makanan);
        $title = "Update Data";
    // $makanan = Makanan::all();

    return view('makanan.edit', compact('makanan', 'title'));
    }

        public function update(Request $request, Makanan $makanan)
        {

            $id = $request->input('id');
            // $makanan = Makanan::find($id);
            $validatedData = $request->validate([
                'nama_makanan' => 'required|max:255',
                'harga' => 'required|numeric',
                'gambar' => 'image',
            ]);


            if ($request->file('gambar')) {

                if ($request->image != NULL) {
                unlink(unlink('daftar_gambar/') . $request->image);
            }
                $image = $request->file('gambar');
                $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->move( './daftar-gambar/', $nameImage);
                $validatedData['gambar'] = $nameImage;
            }


            Makanan::where('id', $id)->update($validatedData);


            return redirect()->route('makanan.index')->with('success', 'Data telah diperbarui');
        }





    public function show()
    {

    }

    public function destroy(Makanan $makanan)
    {
        Makanan::destroy($makanan->id);
        return redirect('makanan/index');
    }
}
