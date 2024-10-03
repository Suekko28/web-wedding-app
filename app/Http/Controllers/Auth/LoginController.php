<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            session(["token" => auth()->user()->createToken($request->email)->plainTextToken]);
            return redirect()->route('dashboard');
        } else {
            return redirect('login')->withErrors('Invalid Credentials');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.form');
    }


    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('email', $request->email);

        $request->validate([
            'nama' => 'required|min:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Minimal nama yang diizinkan adalah 10 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah pernah digunakan, silahkan pilih email yang lain',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal password yang diizinkan adalah 6 karakter',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.form')->with('success', $user->nama . ' berhasil dibuat');
    }
}
