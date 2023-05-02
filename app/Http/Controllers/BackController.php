<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;

class BackController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function index()
    {
        // $users = session('data_login');
        // if($users->login_level == "user"){
        //     return redirect()->route('client-index')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        // }
        return view('dashboard.index');
    }

    public function login()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('login-admin');
    }

    public function logout(Request $request)
    {
        $cek_logout_request = $request->logoutrequest;
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        switch ($users->login_level) {
            case 'admin':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-admin')->with('status', 'Anda telah logout!');
                break;
            case 'user':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-client')->with('status', 'Anda telah logout!');
                break;
            case 'pembina':
                $users = session('data_login');
                $request->session()->forget(['data_login']);
                $request->session()->flush();
                return redirect()->route('login-client')->with('status', 'Anda telah logout!');
                break;
        }
    }

    public function post_login(Request $request)
    {
        $cek_request = $request->cekrequest;
        $username = $request->login_username;
        $cari_user = Login::where('login_username', $username)->first();
        if ($cari_user == null) {
            return back()->with('status', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                if ($cek_request == "user") {
                    return redirect()->route('login-client')->with('status', 'Maaf anda tidak dapat masuk menggunakan akun Administrator pada Aplikasi Client, silahkan masuk ke Akun Administrator pada Halaman Administrator melalui Website');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'user':
                if ($cek_request == "admin") {
                    return redirect()->route('login-admin')->with('status', 'Maaf anda tidak dapat masuk menggunakan akun User pada Aplikasi Client, silahkan masuk ke Akun User pada Halaman User melalui Aplikasi Android');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('client')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'pembina':
                if ($cek_request == "admin") {
                    return redirect()->route('login-admin')->with('status', 'Maaf anda tidak dapat masuk menggunakan akun User pada Aplikasi Client, silahkan masuk ke Akun User pada Halaman User melalui Aplikasi Android');
                }
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('client')->with('status', 'Berhasil Login!');
                    }
                }
                break;
        }
        return back()->with('status', 'Maaf username atau password salah!')->withInput();
    }
}
