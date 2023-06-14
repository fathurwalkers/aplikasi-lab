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
use App\Models\Barang;
use App\Models\Invoice;
use App\Models\Lab;
use App\Models\Penawaran;
use Illuminate\Support\Facades\Redis;

class PenawaranController extends Controller
{
    public function buat_penawaran()
    {
        $barang = Barang::all();
        return view('penawaran.buat-penawaran', [
            'barang' => $barang,
        ]);
    }

    public function proses_penawaran(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        $array_barang = $request->hide_barang;
        $total_harga = $request->hide_harga;
        $explode_barang = explode(",", $array_barang);

        $barang = Barang::findMany($explode_barang);

        dump($users);
        dump($data_users);
        dump($array_barang);
        dump($barang);

        die();
    }

    public function daftar_penawaran()
    {
        return view('penawaran.daftar-penawaran');
    }
}
