<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $baseUrl;
    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL'); 
    }

    public function login()
    {
        return view('login');
    }
    public function handleLogin(Request $request)
    {
        print('method hitted');
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $response = Http::get($this->baseUrl.'api/Login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);
        $data = $response->json();
        if ($response->successful() && isset($data['Type'])) {
            Session::put('user', $data);
            if ($data['Type'] == 'Admin') {
                return redirect()->route('admin.dashboard')->with('userData', $data);
            } elseif ($data['Type'] == 'Datacell') {
                return redirect()->route('datacell.dashboard')->with('userData', $data);
            } else {
                return back()->withErrors(['error' => 'Unauthorized role.']);
            }
        }

        return back()->withErrors(['error' => 'Invalid credentials.']);
    }
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
