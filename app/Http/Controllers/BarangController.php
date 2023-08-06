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
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

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

    public function tambah_barang(Request $request)
    {
        $barang = new Barang;

        $barang_nama = $request->barang_nama;
        $barang_kondisi = $request->barang_status;
        $barang_jumlah = $request->barang_jumlah;
        $barang_harga = $request->barang_harga;
        $barang_kode = "BARANG" . strtoupper(Str::random(10));

        $save_barang = $barang->create([
            "barang_nama" => $barang_nama,
            "barang_kondisi" => $barang_kondisi,
            "barang_kode" => $barang_kode,
            "barang_stok" => intval($barang_jumlah),
            "barang_nilai" => intval($barang_harga),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_barang->save();
        if ($save_barang == true) {
            return redirect()->route('daftar-barang')->with('status', 'Berhasil menambah Data barang baru.');
        } else {
            return redirect()->route('daftar-barang')->with('status', 'Gagal menambah Data barang baru.');
        }
    }

    public function ubah_barang(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang_nama = $request->barang_nama;
        $barang_kondisi = $request->barang_status;
        $barang_jumlah = $request->barang_jumlah;
        $barang_harga = $request->barang_harga;

        $update_barang = $barang->update([
            "barang_nama" => $barang_nama,
            "barang_kondisi" => $barang_kondisi,
            "barang_stok" => intval($barang_jumlah),
            "barang_nilai" => intval($barang_harga),
            "updated_at" => now()
        ]);

        if ($update_barang == true) {
            return redirect()->route('daftar-barang')->with('status', 'Berhasil Merubah Data barang baru.');
        } else {
            return redirect()->route('daftar-barang')->with('status', 'Gagal Merubah Data barang baru.');
        }
    }
}
