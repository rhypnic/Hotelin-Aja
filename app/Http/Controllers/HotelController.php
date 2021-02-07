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
    { $user = Auth::user();
        if ($user->role=='penyedia') {
       
        $hotel = $user->hotel;
        }
        else {
            $hotel = Hotel::all();
        }
        
        
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
        

        $request->validate([
            'nama_hotel' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar_hotel' => 'required',
            'alamat' => 'required',
            'harga' => 'required'
        ]);
        
        $hotel = Hotel::create([
            "nama_hotel" => $request["nama_hotel"],
            "kategori" => $request["kategori"],
            "deskripsi" => $request["deskripsi"],
            "gambar_hotel" => $request["gambar_hotel"],
            "alamat" => $request["alamat"],
            "harga" => $request["harga"],
            "user_id" => Auth::id()
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
        $request->validate([
            'nama_hotel' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar_hotel' => 'required',
            'alamat' => 'required',
            'harga' => 'required'
        ]);
       
        $profile=Hotel::where('id',$id)->update([
            "nama_hotel" => $request["nama_hotel"],
            "kategori" => $request["kategori"],
            "deskripsi" => $request["deskripsi"],
            "gambar_hotel" => $request["gambar_hotel"],
            "alamat" => $request["alamat"],
            "harga" => $request["harga"]
        ]);
        Alert::success('Berhasil', 'Berhasil diedit');
        return redirect('/hotel')->with('success', 'post berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hotel::destroy($id);
        Alert::success('Berhasil', 'Berhasil dihapus');
        return redirect('../../hotel');
    }
}
