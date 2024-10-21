<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            session(["token" => auth()->user()->createToken($request->email)->plainTextToken]);
            return redirect()->route('dashboard');
        } else {
            $validator->getMessageBag()->add('email', 'Username atau Password salah');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    protected function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session(["verified" => false]);
        session(["token" => ""]);

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('dashboard');
    }

    protected function guard()
    {
        return auth()->guard();
    }
}
