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
use App\Models\Jasa;

class JasaController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function daftar_jasa()
    {
        $session_users = session('data_login');
        $users = Login::findOrFail($session_users->id);
        $jasa = Jasa::all();
        return view('jasa.daftar-jasa', [
            'jasa' => $jasa
        ]);
    }

    public function hapus_jasa(Request $request, $id)
    {
        $jasa_id = $id;
        $jasa = Jasa::find($jasa_id);
        $hapus_jasa = $jasa->forceDelete();
        if ($hapus_jasa == true) {
            return redirect()->route('daftar-jasa')->with('status', 'Berhasil menghapus Data jasa.');
        } else {
            return redirect()->route('daftar-jasa')->with('status', 'Gagal menghapus Data jasa.');
        }
    }

    public function tambah_jasa(Request $request)
    {
        $jasa = new Jasa;

        $jasa_nama_alat = $request->jasa_nama_alat;
        $jasa_harga_care = intval($request->jasa_harga_care);
        $jasa_harga_cleaning = intval($request->jasa_harga_cleaning);
        $jasa_harga_kalibrasi = intval($request->jasa_harga_kalibrasi);

        $save_jasa = $jasa->create([
            'jasa_nama_alat' => $jasa_nama_alat,
            'jasa_harga_care' => $jasa_harga_care,
            'jasa_harga_cleaning' => $jasa_harga_cleaning,
            'jasa_harga_kalibrasi' => $jasa_harga_kalibrasi,
            'created_at' => now(),
            "updated_at" => now()
        ]);
        $save_jasa->save();
        if ($save_jasa == true) {
            return redirect()->route('daftar-jasa')->with('status', 'Berhasil menambah Data Jasa baru.');
        } else {
            return redirect()->route('daftar-jasa')->with('status', 'Gagal menambah Data Jasa baru.');
        }
    }

    public function ubah_jasa(Request $request, $id)
    {
        $jasa = Jasa::find($id);

        $jasa_nama_alat = $request->jasa_nama_alat;
        $jasa_harga_care = intval($request->jasa_harga_care);
        $jasa_harga_cleaning = intval($request->jasa_harga_cleaning);
        $jasa_harga_kalibrasi = intval($request->jasa_harga_kalibrasi);

        $update_jasa = $jasa->update([
            'jasa_nama_alat' => $jasa_nama_alat,
            'jasa_harga_care' => $jasa_harga_care,
            'jasa_harga_cleaning' => $jasa_harga_cleaning,
            'jasa_harga_kalibrasi' => $jasa_harga_kalibrasi,
            'updated_at' => now()
        ]);

        if ($update_jasa == true) {
            return redirect()->route('daftar-jasa')->with('status', 'Berhasil Merubah Data Jasa baru.');
        } else {
            return redirect()->route('daftar-jasa')->with('status', 'Gagal Merubah Data Jasa baru.');
        }
    }
}
