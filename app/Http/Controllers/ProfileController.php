<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile', compact('user'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'password' => 'confirmed',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->address = $request->address;

        if (!empty($request->password)) {
            $user->password = $request->password;
        }

        $user->update();

        Alert::success('Berhasil', 'Profil Berhasil di Ubah');
        return redirect('profile');
    }
}
