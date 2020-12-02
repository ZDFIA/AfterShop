<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $login = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(array('email' => $login['email'], 'password' => $login['password'])))
        {
            $user = User::where('id', Auth::user()->id)->first();
            $name = $user->name;

            if(Auth::user()->status == 1)
            {
                $user = User::where('id', Auth::user()->id)->first();

                Alert::success('Selamat Datang '. $name, 'Anda adalah Admin');
            }
            else
            {
                Alert::success('Selamat Datang '. $name, 'Anda berhasil Login');
            }

            return redirect()->route('home');
        }
        else
        {
            Alert::error('Gagal Login', 'Email dan Password Salah');
            return redirect()->route('login');
        }

    }
}
