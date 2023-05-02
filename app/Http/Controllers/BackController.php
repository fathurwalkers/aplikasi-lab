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
        $users = session('data_login');
        if($users->login_level == "user"){
            return redirect()->route('client-index')->with('status', 'Maaf anda tidak punya akses ke halaman ini.');
        }
        return view('dashboard.index');
    }
}
