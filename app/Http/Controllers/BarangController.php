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

class BarangController extends Controller
{
    public function daftar_barang()
    {
        $session_users = session('data_login');
        $users = Login::findOrFail($session_users->id);
        $barang = Barang::all();
        return view('barang.daftar-barang', [
            'barang' => $barang,
            'users' => $users
        ]);
    }

    public function hapus_barang(Request $request, $id)
    {
        $barang_id = $id;
        $barang = Barang::find($barang_id);
        $hapus_barang = $barang->forceDelete();
        if ($hapus_barang == true) {
            return redirect()->route('daftar-barang')->with('status', 'Berhasil menghapus Data barang.');
        } else {
            return redirect()->route('daftar-barang')->with('status', 'Gagal menghapus Data barang.');
        }
    }
}
