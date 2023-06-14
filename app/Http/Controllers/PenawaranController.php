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
        $hide_barang = $request->hide_barang;
        $hide_harga = $request->hide_harga;
        $explode_barang = explode(",", $hide_barang);
        dump($explode_barang);
        dump($hide_barang);
        dump($hide_harga);
        die();
    }

    public function daftar_penawaran()
    {
        return view('penawaran.daftar-penawaran');
    }
}
