<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\HasilPanen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboardGuest()
    {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    public function dashboardAdmin()
    {
        $hasil = HasilPanen::all();
        $kecamatan = Kecamatan::all()->where('id', '<=', '5');
        $arr = [];
        foreach ($kecamatan as $key => $value) {
            if ($value->nama == 'Banjarmasin Tengah') {
                $arr['tengah'] = count($value->hasilPanen);
            } else if ($value->nama == 'Banjarmasin Selatan') {
                $arr['selatan'] = count($value->hasilPanen);
            } else if ($value->nama == 'Banjarmasin Utara') {
                $arr['utara'] = count($value->hasilPanen);
            } else if ($value->nama == 'Banjarmasin Barat') {
                $arr['barat'] = count($value->hasilPanen);
            } else if ($value->nama == 'Banjarmasin Timur') {
                $arr['timur'] = count($value->hasilPanen);
            }
        }

        return view('auth.dashboard', [
            'title' => 'Dashboard',
            'data' => $hasil,
            'kecamatan' => $arr
        ]);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Username Salah', 'password' => 'Password Salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function profile()
    {
        return view('profile', [
            'title' => 'Profile'
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:3|unique:users,username,' . $user->id . ',id',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'telp' => 'required|min:3',
            'password' => 'nullable|min:3'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->telp = $request->telp;

        if ($request->password != null && $request->password2 != null) {
            if ($request->password != $request->password2) {
                return back()->withErrors(['password' => 'Password tidak sama']);
            } else {
                $user->password = bcrypt($request->password);
            }
        }

        $user->save();

        return back()->with('success', 'Profile berhasil diupdate');
    }
}
