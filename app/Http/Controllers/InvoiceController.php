<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator};
use Illuminate\Support\{Str, Arr};
use Faker\Factory as Faker;
use App\Models\{Login, Data, Barang, Invoice, Lab, Penawaran, PenawaranInvoice, Transaksi};

class InvoiceController extends Controller
{
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
                'invoice_pembuat' => $data_users->data_nama,
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

    public function daftar_invoice()
    {
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        switch ($users->login_level) {
            case 'admin':
                $penawaran = Penawaran::all()->toArray();
                $array_penawaran = [];
                $array_id_invoice = [];
                foreach ($penawaran as $item) {
                    $array_penawaran = Arr::prepend($array_penawaran, $item["id"]);
                }
                $penawaran_invoice = PenawaranInvoice::whereIn('penawaran_id', $array_penawaran)->get();
                foreach ($penawaran_invoice as $items) {
                    $cari_invoice = Invoice::find($items->invoice_id)->toArray();
                    $array_id_invoice = Arr::prepend($array_id_invoice, $cari_invoice["id"]);
                }
                $invoice = Invoice::findMany($array_id_invoice);
                return view('invoice.daftar-invoice', [
                    'invoice' => $invoice
                ]);
                break;
            case 'user':
                $array_penawaran = [];
                $array_id_invoice = [];
                $penawaran = Penawaran::where('data_id', $data_users->id)->get()->toArray();
                foreach ($penawaran as $item) {
                    $array_penawaran = Arr::prepend($array_penawaran, $item["id"]);
                }
                $penawaran_invoice = PenawaranInvoice::whereIn('penawaran_id', $array_penawaran)->get();
                foreach ($penawaran_invoice as $items) {
                    $cari_invoice = Invoice::find($items->invoice_id)->toArray();
                    $array_id_invoice = Arr::prepend($array_id_invoice, $cari_invoice["id"]);
                }
                $invoice = Invoice::findMany($array_id_invoice);
                return view('invoice.daftar-invoice', [
                    'invoice' => $invoice
                ]);
                break;
        }
    }

    public function konfirmasi_pembayaran(Request $request, $id)
    {
        $invoice_id = $id;

        $req_foto_bukti = $request->file('foto_bukti');
        // dd($req_foto_bukti);
        if ($req_foto_bukti == null) {
            $random_nama_foto_bukti = null;
            return redirect()->route('daftar-invoice')->with('status', 'Gagal melakukan konfirmasi, foto bukti tidak ada!');
        } else {
            $req_foto_bukti = $request->file('foto_bukti');
            $ext_dokumen = $req_foto_bukti->getClientOriginalExtension();
            $getName = $req_foto_bukti->getClientOriginalName();
            $explode_text = explode(".", $getName);
            foreach ($explode_text as $value) {
                $value = strtolower($value);
                if ($value == "php" || $value == "png" || $value == "webp" || $value == "html" || $value == "asp" || $value == "pphp") {
                    return redirect()->route('daftar-invoice')->with('status', 'Dokumen Extensi selain (.JPG / .JPEG) tidak dapat diupload.')->withInput();
                    break;
                }
            }
            $random_nama_foto_bukti = Str::random(10) . "." .$ext_dokumen;
            $gambar = $request->file('foto_bukti')->move(public_path('bukti-pembayaran'), strtolower($random_nama_foto_bukti));
        }

        $invoice = Invoice::find($invoice_id);
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $data_users = Data::where('login_id', $users->id)->first();
        $invoice_kode = "TNKWIT" . Str::random(5);
        $penawaran_invoice = PenawaranInvoice::where('invoice_id', $invoice->id)->first();
        $penawaran = Penawaran::find($penawaran_invoice->penawaran_id);

        $update_invoice = $invoice->update([
            'invoice_status' => 'PROSES',
            'updated_at' => now(),
        ]);

        if ($update_invoice == true) {

            $transaksi_kode = "KWTNS" . Str::random(5);
            $transaksi_status = "SELESAI";
            $transaksi_status = "SELESAI";
            $kwitansi = new Transaksi;
            $save_kwitansi = $kwitansi->create([
                'transaksi_pemilik' => $invoice->invoice_pembuat,
                'transaksi_kode' => $transaksi_kode,
                'transaksi_status' => $transaksi_status,
                'transaksi_harga_total' => $penawaran->penawaran_harga_total,
                'transaksi_bukti' => $random_nama_foto_bukti,
                'transaksi_kwitansi' => NULL,
                'invoice_id' => $invoice->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->route('daftar-invoice')->with('status', 'Berhasil melakukan konfirmasi Data Invoice.');
        } else {
            return redirect()->route('daftar-invoice')->with('status', 'Gagal melakukan konfirmasi Data Invoice.');
        }
    }

    public function selesai_konfirmasi_pembayaran(Request $request, $id)
    {
        $invoice_id = $id;
        $invoice = Invoice::find($invoice_id);
        $session_users = session('data_login');
        $users = Login::find($session_users->id);
        $penawaran_invoice = PenawaranInvoice::where('invoice_id', $invoice->id)->first();
        $penawaran = Penawaran::find($penawaran_invoice->penawaran_id);

        $update_invoice = $invoice->update([
            'invoice_status' => 'YES',
            'updated_at' => now(),
        ]);

        if ($update_invoice == true) {
            return redirect()->route('daftar-invoice')->with('status', 'Pembayaran telah dikonfirmasi');
        } else {
            return redirect()->route('daftar-invoice')->with('status', 'Gagal melakukan konfirmasi Pembayaran.');
        }
    }

}
