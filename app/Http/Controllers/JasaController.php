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
}
