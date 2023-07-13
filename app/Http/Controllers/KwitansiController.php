<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    public function cetak_kwitansi()
    {
        return view('kwitansi.cetak-kwitansi');
    }
}
