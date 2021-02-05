<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\profile;
use Auth;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // ->except(['index']);
    }
    public function create()
    {
        return view('projek_akhir.crud_profile.create-profile');
    }
    public function index()
    {   
        //$posts=DB::table('pertanyaan')->get();
       
        return view('projek_akhir.crud_profile.show-profile');
    }
    public function store(Request $request)
    {   
        
        
        $profile=profile:: create([
            "nama"=> $request["nama"],
            "phone_number"=> $request["phone_number"],
            "deskripsi"=> $request["deskripsi"],
            "email"=>$request["e-mail"],
            "user_id" =>Auth::user()->id
        ]);
        Alert::success('Berhasil', 'Berhasil menyimpan');

        return redirect('/profile')->with('success', 'post berhasil di simpan');
       
    }
public function edit($id)
        {   
            
            return view('projek_akhir.crud_profile.edit-profile');
        }
        public function show($id)
    {   
       // $posts=DB::table('pertanyaan')->where('id',$id)->first();
        $profile=profile::find($id);
        return view('projek_akhir.crud_profile.show-profile',compact('profile'));
    }
    public function update($id,Request $request)
    {   
        $request->validate([
            'nama' => 'required'
        ]);
        $profile=profile::where('id',$id)->update([
            "nama"=>$request["nama"],
        "phone_number"=>$request["phone_number"],
        "deskripsi"=>$request["deskripsi"]
        ]);
        Alert::success('Berhasil', 'Berhasil diedit');
        return redirect('/profile')->with('success', 'post berhasil di edit');
    }
    public function destroy($id)
    {   

       // $query=DB::table('pertanyaan')->where('id',$id)->delete();
       profile::destroy($id);
        return redirect('../../register');
    }
}
