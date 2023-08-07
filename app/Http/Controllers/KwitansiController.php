<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator};
use Illuminate\Support\{Str, Arr};
use Faker\Factory as Faker;
use App\Models\{Login, Data, Barang, Invoice, Lab, Penawaran, PenawaranInvoice, Transaksi};

class KwitansiController extends Controller
{
    public function cetak_kwitansi(Request $request)
    {
        $invoice_id = $request->id_invoice;

        $penawaran_invoice = {}

        return view('kwitansi.cetak-kwitansi');
    }
}
