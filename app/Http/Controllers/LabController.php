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

class LabController extends Controller
{
    public function daftar_lab()
    {
        $session_users = session('data_login');
        $users = Login::findOrFail($session_users->id);
        $lab = Lab::all();
        return view('lab.daftar-lab', [
            'lab' => $lab,
            'users' => $users
        ]);
    }

    public function hapus_lab(Request $request, $id)
    {
        $lab_id = $id;
        $lab = Lab::find($lab_id);
        dd($lab);
    }
}
