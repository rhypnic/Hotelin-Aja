<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // ->except(['index']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|unique:pertanyaan|max:255'
        ]);
       
        $profile=Profile:: create([
            "nama"=> $request["nama"],
            "phone"=> $request["phone_number"],
            "deskripsi"=> $request["deskripsi"],
            "user_id" =>Auth::id()
        ]);
        Alert::success('Berhasil', 'Berhasil menyimpan');

        return redirect('/show/profile')->with('success', 'post berhasil di simpan');
    }
}
