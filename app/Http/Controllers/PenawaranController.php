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
use App\Models\Jasa;
use App\Models\Lab;
use App\Models\Penawaran;
use Illuminate\Support\Facades\Redis;

class PenawaranController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = session('data_login');
    }

    public function buat_penawaran()
    {
        $barang = Barang::all();
        return view('penawaran.buat-penawaran', [
            'barang' => $barang,
        ]);
    }

    public function buat_penawaran_jasa()
    {
        $jasa = Jasa::all();
        return view('penawaran.buat-penawaran-jasa', [
            'jasa' => $jasa,
        ]);
    }

    public function proses_penawaran(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        $array_barang = $request->hide_barang;
        $total_harga = $request->hide_harga;
        $penawaran_deskripsi = $request->penawaran_deskripsi;
        $explode_barang = explode(",", $array_barang);

        $barang = Barang::findMany($explode_barang);
        foreach ($barang as $item) {
            $penawaran = new Penawaran;
            $penawaran_kode = "PNRWN" . Str::random(10);
            $penawaran_status = "PENDING";
            $save_penawaran = $penawaran->create([
                'penawaran_kode' => strtoupper($penawaran_kode),
                'penawaran_deskripsi' => $penawaran_deskripsi,
                'penawaran_status' => $penawaran_status,
                'penawaran_harga_total' => intval($total_harga),
                'data_id' => $data_users->id,
                'barang_id' => $item->id,
                'jasa_id' => NULL,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_penawaran->save();
        }
        return redirect()->route('daftar-penawaran')->with('status', 'Penawaran telah berhasil dibuat, silahkan menunggu konfirmasi penawaran anda disetujui oleh Admin.');
    }

    public function proses_penawaran_jasa(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();

        $jasa = Jasa::find(intval($request->id_jasa));
        dd($request->id_jasa);
        $jenis_jasa = $request->jenis_jasa;
        switch ($jenis_jasa) {
            case 'car':
                $total_harga = $jasa->jasa_harga_care;
                break;
            case 'clean':
                $total_harga = $jasa->jasa_harga_cleaning;
                break;
            case 'cal':
                $total_harga = $jasa->jasa_harga_kalibrasi;
                break;
            case 'paketlengkap':
                $total_harga = $total_harga = $jasa->jasa_harga_care + $jasa->jasa_harga_cleaning + $jasa->jasa_harga_kalibrasi;
                break;
        }

        $penawaran_deskripsi = $request->penawaran_deskripsi;
        $penawaran_kode = "PNRWN" . Str::random(10);
        $penawaran_status = "PENDING";

        $penawaran = new Penawaran;
        $save_penawaran = $penawaran->create([
            'penawaran_kode' => strtoupper($penawaran_kode),
            'penawaran_deskripsi' => $penawaran_deskripsi,
            'penawaran_status' => $penawaran_status,
            'penawaran_harga_total' => intval($total_harga),
            'data_id' => $data_users->id,
            'barang_id' => NULL,
            'barang_id' => $jasa->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_penawaran->save();
        return redirect()->route('daftar-penawaran')->with('status', 'Penawaran telah berhasil dibuat, silahkan menunggu konfirmasi penawaran anda disetujui oleh Admin.');
    }

    public function daftar_penawaran()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        switch ($users->login_level) {
            case 'user':
                $penawaran = Penawaran::where('data_id', $data_users->id)->get();
                return view('penawaran.daftar-penawaran', [
                    'penawaran' => $penawaran
                ]);
                break;
            case 'admin':
                $penawaran = Penawaran::all();
                return view('penawaran.daftar-penawaran', [
                    'penawaran' => $penawaran
                ]);
                break;
        }
    }

    public function hapus_penawaran(Request $request, $id)
    {
        $penawaran_id = $id;
        $penawaran = Penawaran::find($penawaran_id);
        $hapus_penawaran = $penawaran->forceDelete();
        if ($hapus_penawaran == true) {
            return redirect()->route('daftar-penawaran')->with('status', 'Berhasil menghapus Data Penawaran.');
        } else {
            return redirect()->route('daftar-penawaran')->with('status', 'Gagal menghapus Data Penawaran.');
        }
    }

    public function konfirmasi_penawaran(Request $request, $id)
    {
        $penawaran_id = $id;
        $penawaran = Penawaran::find($penawaran_id);

        switch ($penawaran->penawaran_status) {
            case 'PENDING':
                $penawaran_status = "PROSES";
                break;
            case 'PROSES':
                $penawaran_status = "KONFIRMASI";
                break;
        }

        $update_penawaran = $penawaran->update([
            'penawaran_status' => $penawaran_status,
            'updated_at' => now(),
        ]);
        if ($update_penawaran == true) {
            return redirect()->route('daftar-penawaran')->with('status', 'Berhasil melakukan konfirmasi Data Penawaran.');
        } else {
            return redirect()->route('daftar-penawaran')->with('status', 'Gagal melakukan konfirmasi Data Penawaran.');
        }
    }
}
