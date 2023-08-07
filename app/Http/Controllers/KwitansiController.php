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

        $penawaran_invoice = PenawaranInvoice::where('invoice_id', intval($invoice_id))->first();

        $penawaran = Penawaran::find($penawaran_invoice->penawaran_id);
        $invoice = Invoice::find($penawaran_invoice->invoice_id);
        $transaksi = Transaksi::where('invoice_id', $invoice->id)->first();

        return view('kwitansi.cetak-kwitansi', [
            'penawaran' => $penawaran,
            'invoice' => $invoice,
            'transaksi' => $transaksi,
        ]);
    }
}
