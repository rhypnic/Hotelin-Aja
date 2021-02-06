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
        $role1="penginap";
         $role2="penyedia";
         $roleku=Auth::user()->role;
            
        return view('projek_akhir.crud_profile.show-profile');
    }
    public function store(Request $request)
    {   
        $role1="penginap";
        $role2="penyedia";
        $roleku=Auth::user()->role;
        
        $profile=profile:: create([
            "nama"=> $request["nama"],
            "phone_number"=> $request["phone_number"],
            "deskripsi"=> $request["deskripsi"],
            "email"=>Auth::user()->email,
            "user_id" =>Auth::user()->id
        ]);
        Alert::success('Berhasil', 'Berhasil menyimpan');
        
        return redirect('/profile')->with('success', 'post berhasil di simpan');
       
    }
public function edit($id)
        {   
        $role1="penginap";
         $role2="penyedia";
         $roleku=Auth::user()->role;
            
            return view('projek_akhir.crud_profile.edit-profile',compact('role1','role2','roleku'));
        }
        public function show($id)
    {   
       // $posts=DB::table('pertanyaan')->where('id',$id)->first();
       $role1="penginap";
       $role2="penyedia";
       $rolemu=$role2;
      $roleku=strcmp('$role2' ,'$rolemu' ); /*penyedia*/
        
        $profile=profile::find($id);
        return view('projek_akhir.crud_profile.show-profile',compact('profile','role1','role2','roleku'));
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