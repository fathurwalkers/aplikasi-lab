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
use App\Models\PenawaranInvoice;

class InvoiceController extends Controller
{
    public function pembuatan_invoice(Request $request)
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        $array_penawaran = $request->hide_penawaran;
        $explode_penawaran = explode(",", $array_penawaran);

        $penawaran = Penawaran::findMany($explode_penawaran);
        foreach ($penawaran as $item) {
            $invoice = new Invoice;
            $invoice_kode = "INVC" . Str::random(5);
            $invoice_status = "NO"; // NO = Belum Bayar / YES = Sudah Bayar
            $save_invoice = $invoice->create([
                'invoice_kode' => strtoupper($invoice_kode),
                'invoice_status' => $invoice_status,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_invoice->save();

            $penawaran_invoice = new PenawaranInvoice;
            $save_penawaran_invoice = $penawaran_invoice->create([
                'penawaran_id' => $item->id,
                'invoice_id' => $save_invoice->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_penawaran_invoice->save();
        }
        return redirect()->route('daftar-invoice')->with('status', 'Invoice telah berhasil dibuat.');
    }

    public function cetak_invoice(Request $request)
    {
        $id_invoice = $request->id_invoice;
        $invoice = Invoice::find($id_invoice);
        $penawaran_invoice = PenawaranInvoice::where('invoice_id', $invoice->id)->first();
        $penawaran = Penawaran::find($penawaran_invoice->penawaran_id);

        return view('invoice.cetak-invoice', [
            'invoice' => $invoice,
            'penawaran' => $penawaran,
        ]);
    }

    public function daftar_invoice()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        switch ($users->login_level) {
            case 'user':
                $array_penawaran = [];
                $array_id_invoice = [];
                $penawaran = Penawaran::where('data_id', $data_users->id)->get()->toArray();
                foreach ($penawaran as $item) {
                    $array_penawaran = Arr::prepend($array_penawaran, $item["id"]);
                }
                $penawaran_invoice = PenawaranInvoice::findMany($array_penawaran);
                foreach ($penawaran_invoice as $items) {
                    $cari_invoice = Invoice::find($items->invoice_id)->toArray();
                    $array_id_invoice = Arr::prepend($array_id_invoice, $cari_invoice["id"]);
                }
                $invoice = Invoice::findMany($array_id_invoice);
                return view('invoice.daftar-invoice', [
                    'invoice' => $invoice
                ]);
                break;
            case 'admin':
                $invoice = Invoice::all();
                return view('invoice.daftar-invoice', [
                    'invoice' => $invoice
                ]);
                break;
        }
    }
}
