<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>INVOICE - {{ strtoupper($invoice->invoice_kode) }}</title>

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
        <div class="title d-flex justify-content-center">
            <div class="wrapper d-flex justify-content-between align-items-center me-0 position-relative px-3">
                <div class="logo-1" style="width: auto">
                    <img src="{{ asset('assets/invoice') }}/img/ruang lab.png" alt="ruanglab" style="width: 200px" />
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
                    <img src="{{ asset('assets/invoice') }}/img/pt rumah.png" alt="ruanglab" style="width: 200px" />
                </div>
                <hr class="d-block position-absolute"
                    style="width: 100%; height: 3px; opacity: 1; background-color: #346aba; left: 0; bottom: 20px" />
            </div>
        </div>
        <!-- end of title -->

        <!-- letter head -->
        <div class="letterhead">
            <div class="invoice-text text-end" style="margin-right: 150px">
                <h1 class="mb-0 me-5 fw-light" style="font-size: 3rem">INVOICE</h1>
            </div>
            <div class="invoice-detail d-flex justify-content-between">
                <div class="comp-name" style="padding: 0 83px">
                    <p class="fw-bold mb-0">Kepada : {{ $penawaran->data->data_nama }}</p>
                    <p>di Yogyakarta</p>
                </div>
                <div class="number-date" style="padding: 0 83px">
                    <p class="mb-0">Nomor Kode : <font class="fw-bold">{{ $invoice->invoice_kode }}</font>
                    </p>
                    <p>Tanggal : {{ date('d-m-Y', strtotime($invoice->created_at)) }}</p>
                </div>
            </div>
        </div>
        <!-- end of letterhead -->

        <!-- top content -->
        <div class="content mt-5">
            <div class="body-content text-center mx-5 px-3">
                <table class="table table-content table-hover px-2">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Quantity</th>
                            <th scope="col">Description</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Line Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">#</th>
                            <td>
                                {{ $penawaran->penawaran_deskripsi }}
                            </td>
                            <td>Rp {{ $penawaran->penawaran_harga_total }}</td>
                            <td>Rp {{ $penawaran->penawaran_harga_total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="total mb-5">
            <div class="total-box d-flex justify-content-end me-5">
                <table style="width: 350px; margin: 0 30px">
                    <tr>
                        <td class="px-5">Subtotal</td>
                        <td>Rp</td>
                        <td class="text-end">
                            {{ 'Rp ' . number_format($penawaran->penawaran_harga_total, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        @php
                            function hitungHargaSetelahPotonganPPN($harga)
                            {
                                $ppnPersen = 11; // Persentase PPN
                                $potonganPPN = ($harga * $ppnPersen) / 100; // Menghitung nilai potongan PPN
                                $hargaSetelahPotonganPPN = $harga - $potonganPPN; // Harga setelah potongan PPN
                                return $hargaSetelahPotonganPPN;
                            }

                            $hargaSebelumPPN = $penawaran->penawaran_harga_total;
                            $hargaSetelahPotonganPPN = hitungHargaSetelahPotonganPPN($hargaSebelumPPN);
                        @endphp
                        <td class="px-5">PPN 11%</td>
                        <td>Rp</td>
                        <td class="text-end">
                            {{ 'Rp ' . number_format($hargaSetelahPotonganPPN, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 fw-bold">TOTAL</td>
                        <td class="p-1" style="background-color: #abe9f8">Rp</td>
                        <td class="text-end p-1" style="background-color: #abe9f8">
                            {{ 'Rp ' . number_format($hargaSetelahPotonganPPN, 2, ',', '.') }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- end of top content -->

        <div class="footer mx-5 d-flex">
            <div class="sign mx-5 px-3 position-relative">
                <div class="sign-box me-5">
                    <p class="text-center" style="margin-bottom: 100px">Direktur</p>
                    <img class="d-block mb-5 position-absolute" src="{{ asset('assets/invoice') }}/img/pt rumah.png"
                        alt="pt" style="width: 90px; top: 80px; left: 40px" />
                    <p class="mb-0 text-center">Mulya Nusantara</p>
                    <p>(.....................................)</p>
                </div>
            </div>
            <div class="dialog-info mx-5" style="width: 270px">
                <div class="dialog-box border border-2 border-dark p-2">
                    <p class="mb-0">*) Pembayaran bisa dilakukan dengan Transfer ke rekening a.n PT. Rumah Mulya
                        Nusantara,</p>
                    <p class="mb-0">Bank Mandiri No. 137-00-1815445-6</p>
                    <p class="mb-0 fw-bold">GARANSI SERVICE 1 Bulan</p>
                </div>
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
