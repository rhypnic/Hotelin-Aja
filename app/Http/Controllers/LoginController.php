<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyedia;
use App\Penyewa;
//use Auth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function getLogin()
  {
    return view('login');
  }

  public function postLogin(Request $request)
  {

      // Validate the form data
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

      // Attempt to log the penyewa in
      // Passwordnya pake bcrypt
    if (Auth::guard('penyedia')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
      return redirect()->intended('/penyedia');
    } else if (Auth::guard('penyewa')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->intended('/penyewa');
    }

  }

  public function logout()
  {
    Auth::logout();

    return redirect('/hotel');

  }
}