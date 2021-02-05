<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use Auth;
Use Alert;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $hotel = Hotel::all();
        
        return view('projek_akhir.crud_hotel.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projek_akhir.crud_hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $hotel = Hotel::create([
            "nama_hotel" => $request["nama_hotel"],
            "kategori" => $request["kategori"],
            "deskripsi" => $request["deskripsi"],
            "gambar_hotel" => $request["gambar_hotel"],
            "alamat" => $request["alamat"],
            "harga" => $request["harga"]
        ]);
        // $user = Auth::user();
        // $user->hotels()->save($hotel);
        if ($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar', 'public');
            var_dump($gambar); exit;
        }

        Alert::success('Selamat!', 'Hotel berhasil ditambahkan');

        return redirect('/hotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
        return view('projek_akhir.crud_hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('projek_akhir.crud_hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
