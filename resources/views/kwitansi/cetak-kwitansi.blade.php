<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>KWITANSI PEMBAYARAN - {{ strtoupper($transaksi->transaksi_kode) }}</title>

    <style>
        .table-content thead {
            background-color: #63a1fe;
        }

        .table-content tbody tr:nth-child(even) {
            background-color: #abe9f8;
        }

        .footer .dialog-box p {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container col-xl-10">
        <!-- title -->
        <div class="title d-flex justify-content-center mb-5">
            <div class="wrapper d-flex justify-content-between align-items-center me-0 position-relative px-3">
                <div class="logo-1" style="width: auto">
                    <img src="{{ asset('assets/invoice/') }}/img/ruang lab.png" alt="ruanglab" style="width: 200px" />
                </div>
                <div class="content-title mt-3">
                    <div class="company-name text-center">
                        <h4 class="mb-0" style="color: #346aba">PT RUMAH MULYA NUSANTARA</h4>
                        <p class="fw-bold text-secondary mb-1">General Trading & Information Technology</p>
                    </div>
                    <div class="company-address text-center">
                        <p class="mb-1" style="font-size: 0.8rem">Maguwoharjo, Sleman, Yogyakarta Telp. 0857-4366-1020
                            https://ruanglab.com</p>
                    </div>
                </div>
                <div class="logo-2">
                    <img src="{{ asset('assets/invoice/') }}/img/pt rumah.png" alt="ruanglab" style="width: 200px" />
                </div>
                <hr class="d-block position-absolute"
                    style="width: 100%; height: 3px; opacity: 1; background-color: #346aba; left: 0; bottom: 20px" />
            </div>
        </div>
        <!-- end of title -->

        <!-- content -->
        <div class="content pt-2 mb-5">
            <div class="content-head pt-4 d-flex align-items-center mb-5" style="padding: 0 90px;">
                <div class="number mx-5">
                    <p class="mb-0">NO. <font class="fw-bold py-1 px-5 ms-5" style="background-color: #abe9f8;">20148
                        </font>
                    </p>
                </div>
                <div class="kuitansi px-4 mx-4">
                    <div class="kuitansi-text px-4 mx-4">
                        <h1 class="mb-0 fw-light mx-4" style="color: #015089;">KUITANSI</h1>
                    </div>
                </div>
            </div>

            <div class="content-table">
                <table>
                    <tr class=" d-block mb-3" style="margin-left: 88px;">
                        <td style="padding: 0 50px;">Telah terima dari </td>
                        <td style="padding-left: 80px;">:</td>
                        <td class="fw-bold">
                            {{ $invoice->invoice_pembuat }}
                        </td>
                    </tr>
                    <tr class=" d-block mb-2" style="margin-left: 88px;">
                        <td style="padding: 0 50px;">Uang Sejumlah </td>
                        <td style="padding-left: 91px;">:</td>
                        <td class="fw-bold py-3" style="background-color: #abe9f8;">

                            @php
                                function terbilang($angka)
                                {
                                    $angka = floatval($angka);
                                    $angka_format = number_format($angka, 0, ',', '.');
                                    $angka_array = explode('.', $angka_format);
                                
                                    $bilangan = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];
                                
                                    $terbilang = '';
                                
                                    if ($angka < 12) {
                                        $terbilang = ' ' . $bilangan[$angka];
                                    } elseif ($angka < 20) {
                                        $terbilang = terbilang($angka - 10) . ' Belas';
                                    } elseif ($angka < 100) {
                                        $terbilang = terbilang(intval($angka / 10)) . ' Puluh' . terbilang($angka % 10);
                                    } elseif ($angka < 200) {
                                        $terbilang = ' Seratus' . terbilang($angka - 100);
                                    } elseif ($angka < 1000) {
                                        $terbilang = terbilang(intval($angka / 100)) . ' Ratus' . terbilang($angka % 100);
                                    } elseif ($angka < 2000) {
                                        $terbilang = ' Seribu' . terbilang($angka - 1000);
                                    } elseif ($angka < 1000000) {
                                        $terbilang = terbilang(intval($angka / 1000)) . ' Ribu' . terbilang($angka % 1000);
                                    } elseif ($angka < 1000000000) {
                                        $terbilang = terbilang(intval($angka / 1000000)) . ' Juta' . terbilang($angka % 1000000);
                                    } elseif ($angka < 1000000000000) {
                                        $terbilang = terbilang(intval($angka / 1000000000)) . ' Milyar' . terbilang($angka % 1000000000);
                                    } elseif ($angka < 1000000000000000) {
                                        $terbilang = terbilang(intval($angka / 1000000000000)) . ' Trilyun' . terbilang($angka % 1000000000000);
                                    }
                                
                                    return $terbilang;
                                }
                                
                                $angka = $transaksi->transaksi_harga_total;
                                $terbilang = terbilang($angka);
                            @endphp

                            #{{ $terbilang }} Rupiah#
                        </td>
                    </tr>
                    <tr class=" d-block mb-3" style="margin-left: 88px;">
                        <td style="padding: 0 50px;">Untuk Pembayaran</td>
                        <td style="padding-left: 65px;">:</td>
                        <td class="">
                            {{ $penawaran->penawaran_deskripsi }}
                            <br />
                            @if ($penawaran->barang_id !== null)
                                {{ $penawaran->barang->barang_nama }}
                            @endif
                            @if ($penawaran->jasa_id !== null)
                                {{ $penawaran->jasa->jasa_nama_alat }}
                                <br />
                            @endif
                            <br />
                            <font class="fw-bold">(Kode Invoice : {{ $invoice->invoice_kode }})</font>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- endof content -->

        <div class="kuitansi-info pt-5">
            <div class="date-info text-end px-5 mx-5 mb-4">
                <p>Yogyakarta, {{ date('d, M Y', strtotime($transaksi->created_at)) }}</p>
            </div>
            <div class="info-dialog d-flex justify-content-between" style="padding: 0 90px;">
                <div class="price-box ms-5">
                    <h3 class="p-3" style="background-color: #abe9f8;">
                        Rp
                        <font class="ms-5">
                            {{ 'Rp ' . number_format($transaksi->transaksi_harga_total, 2, ',', '.') }}
                        </font>
                    </h3>
                </div>
                <div class="penyetor-box">
                    <p class="text-center mb-5">Penyetor</p>
                    <p class="text-center" style="padding-top: 40px;">(.........................)</p>
                </div>
                <div class="Penerima-box position-relative">
                    <p class="text-center mb-5">Hormat Kami,</p>
                    <p class="text-center pt-3 mb-0">Mulya Nusantara</p>
                    <img class="position-absolute" src="img/pt rumah.png" alt="pt rumah"
                        style="width: 90px; bottom: 50px; left: 15px;">
                    <p class="text-center">(.........................)</p>
                </div>
            </div>
        </div>


        <div class="footer mt-5 mx-5 px-5">
            <div class="dialog-info mx-5" style="width: 270px">
                <div class="dialog-box border border-2 border-dark p-2">
                    <p class="mb-0">*)
                        Pembayaran bisa dilakukan dengan Transfer ke rekening a.n PT. Rumah Mulya Nusantara,</p>
                    <p class="mb-0">Bank Mandiri No. 137-00-1815445-6</p>
                    <p class="mb-0 fw-bold">GARANSI SERVICE 1 Bulan</p>
                </div>
            </div>
        </div>



        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
            window.print()
        </script>
</body>

</html>
