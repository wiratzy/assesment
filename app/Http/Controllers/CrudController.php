<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $title = "Menu Utama";
        $datamakanan = Makanan::all();
        return view('kasir.tugas',compact('datamakanan', 'title'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {

    }



    public function show()
    {

    }

    public function destroy()
    {

    }
}
