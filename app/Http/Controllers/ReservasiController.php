<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use Auth;
Use Alert;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $reservasi = Reservasi::paginate('10');
        return view('projek_akhir.crud_reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $nama_hotel)
    {
        
        $nama = $nama_hotel->hotel;
        return view('projek_akhir.crud_reservasi.create', compact('nama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            
            'type_kamar'=> 'required',
            'tggl_checkin'=> 'required',
            'tggl_checkout'=> 'required',
            'tggl_checkout'=> 'required',
            'status' => 'required'
            ]
        );

        $reservasi = Reservasi::create([
            "profile_id"=> Auth::user()->profile->id,
            "kamar_id" => $request["type_kamar"],
            "tggl_checkin"=> $request["tggl_checkin"],
            "tggl_checkout"=> $request["tggl_checkout"],
            "tggl_checkout"=> $request["tggl_checkout"],
            "status" => $request["status"]
        ]);

        Alert::success('Selamat!', 'Reservasi berhasil ditambahkan');

        return redirect('/reservasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservasi = Reservasi::find($id);
        return view('projek_akhir.crud_reservasi.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservasi = Reservasi::findorfail($id);
        return view('projek_akhir.crud_reservasi.edit', compact('reservasi'));
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
        // dd($request->tggl_checkout);
        $this->validate($request, [
            
            'type_kamar'=> 'required',
            'tggl_checkin'=> 'required',
            'tggl_checkout'=> 'required',
            'tggl_checkout'=> 'required',
            'status' => 'required'
            ]
        );
        $reservasi_data=Reservasi::where('id',$id)->update([
            "profile_id"=>  Auth::user()->profile->id,
            "kamar_id" => $request["type_kamar"],
            "tggl_checkin"=> $request["tggl_checkin"],
            "tggl_checkout"=> $request["tggl_checkout"],
            "tggl_checkout"=> $request["tggl_checkout"],
            "status" => $request["status"]
        ]);


        Alert::success('Selamat!', 'Reservasi berhasil diubah');

        return redirect('/reservasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservasi::destroy($id);
        Alert::success('Selamat!', 'Reservasi berhasil dihapus');
        return redirect('/reservasi');
    }
}