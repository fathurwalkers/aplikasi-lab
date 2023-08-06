@extends('layouts.dashboard-layouts')
@section('title', 'RuangLab - Daftar Penawaran')
@section('content-prefix', 'Daftar Penawaran')
@section('content-header', 'Dashboard - Daftar Penawaran')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
        .hh-grayBox {
            background-color: #F8F8F8;
            margin-bottom: 20px;
            padding: 35px;
            margin-top: 20px;
        }

        .pt45 {
            padding-top: 45px;
        }

        .order-tracking {
            text-align: center;
            width: 33.33%;
            position: relative;
            display: block;
        }

        .order-tracking .is-complete {
            display: block;
            position: relative;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            border: 0px solid #AFAFAF;
            background-color: #f7be16;
            margin: 0 auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
            z-index: 2;
        }

        .order-tracking .is-complete:after {
            display: block;
            position: absolute;
            content: '';
            height: 14px;
            width: 7px;
            top: -2px;
            bottom: 0;
            left: 5px;
            margin: auto 0;
            border: 0px solid #AFAFAF;
            border-width: 0px 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }

        .order-tracking.completed .is-complete {
            border-color: #27aa80;
            border-width: 0px;
            background-color: #27aa80;
        }

        .order-tracking.completed .is-complete:after {
            border-color: #fff;
            border-width: 0px 3px 3px 0;
            width: 7px;
            left: 11px;
            opacity: 1;
        }

        .order-tracking p {
            color: #A4A4A4;
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            line-height: 20px;
        }

        .order-tracking p span {
            font-size: 14px;
        }

        .order-tracking.completed p {
            color: #000;
        }

        .order-tracking::before {
            content: '';
            display: block;
            height: 3px;
            width: calc(100% - 40px);
            background-color: #f7be16;
            top: 13px;
            position: absolute;
            left: calc(-50% + 20px);
            z-index: 0;
        }

        .order-tracking:first-child:before {
            display: none;
        }

        .order-tracking.completed:before {
            background-color: #27aa80;
        }
    </style>
@endpush

@section('main-content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h4>
                            <b>
                                Daftar Penawaran
                            </b>
                        </h4>
                    </div>

                    @if ($users->login_level == 'user')
                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                            <button type="button" class="badge badge-lg badge-primary mr-1">
                                <b>Total Pilihan :
                                    <span id="counterbadges">0</span>
                                </b>
                            </button>
                            <form action="{{ route('pembuatan-invoice') }}" method="POST">
                                @csrf
                                <input type="hidden" name="hide_penawaran" id="hide_penawaran">
                                <button type="submit" class="btn btn-md btn-primary">
                                    Proses
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Pembuat Penawaran</th>
                                    <th>Jenis Penawaran</th>
                                    <th>Nama Barang / Pelayanan Jasa</th>
                                    <th>Kode Penawaran</th>
                                    <th>Status</th>
                                    <th>Harga Total</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($penawaran as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->data->data_nama }}</td>

                                        @if ($item->barang_id !== null)
                                            <td>Pengadaan dan Peminjaman Barang</td>
                                        @endif
                                        @if ($item->jasa !== null)
                                            <td>Pelayanan Jasa</td>
                                        @endif

                                        @if ($item->barang_id !== null)
                                            <td>{{ $item->barang->barang_nama }}</td>
                                        @endif
                                        @if ($item->jasa !== null)
                                            <td>{{ $item->jasa->jasa_nama_alat }}</td>
                                        @endif

                                        <td>{{ $item->penawaran_kode }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning"
                                                data-target="#modalstatus{{ $item->id }}" data-toggle="modal">
                                                Cek Status
                                            </button>
                                        </td>
                                        <td>{{ $item->penawaran_harga_total }}</td>
                                        <td class="mx-auto btn-group">
                                            {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button> --}}
                                            {{-- <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button> --}}
                                            <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal"
                                                data-target="#modal_hapus{{ $item->id }}">Hapus</button>
                                            @if ($users->login_level == 'admin')
                                                @if ($item->penawaran_status == 'PENDING' || $item->penawaran_status == 'PROSES')
                                                    <form action="{{ route('konfirmasi-penawaran', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-info">
                                                            @switch($item->penawaran_status)
                                                                @case('PENDING')
                                                                    Proses
                                                                @break

                                                                @case('PROSES')
                                                                    Konfirmasi
                                                                @break
                                                            @endswitch
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            @if ($users->login_level == 'user')
                                                @if ($item->penawaran_status == 'KONFIRMASI')
                                                    <button type="button" class="btn btn-sm btn-info mr-1"
                                                        onclick="simpan_penawaran({{ $item->id }})">PILIH</button>
                                                @endif
                                            @endif

                                            <!-- Modal Status -->
                                            <div class="modal fade" id="modalstatus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                Status Penawaran
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="row d-flex justify-content-center">
                                                                    @if ($item->penawaran_status == 'PENDING')
                                                                        <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                                                            <div class="row justify-content-between">
                                                                                <div class="order-tracking completed">
                                                                                    <span class="is-complete">
                                                                                    </span>
                                                                                    <p>Pending<br>
                                                                                        <span>
                                                                                            {{ date('d, M Y', strtotime($item->created_at)) }}
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="order-tracking">
                                                                                    <span class="is-complete"></span>
                                                                                    <p>Di Proses<br>
                                                                                        <span>
                                                                                            {{ date('d, M Y', strtotime($item->updated_at)) }}
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="order-tracking">
                                                                                    <span class="is-complete"></span>
                                                                                    <p>Di Konfirmasi<br>
                                                                                        <span>
                                                                                            Lakukan Penyelesaian
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    @if ($item->penawaran_status == 'PROSES')
                                                                        <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                                                            <div class="row justify-content-between">
                                                                                <div class="order-tracking completed">
                                                                                    <span class="is-complete">
                                                                                    </span>
                                                                                    <p>Pending<br>
                                                                                        <span>
                                                                                            {{ date('d, M Y', strtotime($item->created_at)) }}
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="order-tracking completed">
                                                                                    <span class="is-complete"></span>
                                                                                    <p>Di Proses<br>
                                                                                        <span>
                                                                                            {{ date('d, M Y', strtotime($item->updated_at)) }}
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="order-tracking">
                                                                                    <span class="is-complete"></span>
                                                                                    <p>Di Konfirmasi<br>
                                                                                        <span>
                                                                                            Lakukan Penyelesaian
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    @if ($item->penawaran_status == 'KONFIRMASI')
                                                                        <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                                                            <div class="row justify-content-between">
                                                                                <div class="order-tracking completed">
                                                                                    <span class="is-complete">
                                                                                    </span>
                                                                                    <p>Pending<br>
                                                                                        <span>
                                                                                            {{ date('d, M Y', strtotime($item->created_at)) }}
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="order-tracking completed">
                                                                                    <span class="is-complete"></span>
                                                                                    <p>Di Proses<br>
                                                                                        <span>
                                                                                            {{ date('d, M Y', strtotime($item->updated_at)) }}
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                                <div class="order-tracking completed">
                                                                                    <span class="is-complete"></span>
                                                                                    <p>Di Konfirmasi<br>
                                                                                        <span>
                                                                                            Lakukan Penyelesaian
                                                                                        </span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-dismiss="modal">Batalkan</button>
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modal_hapus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                Peringatan
                                                                Aksi!</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus item ini?
                                                                <br>
                                                                Kode Penawaran : <b>{{ $item->penawaran_kode }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('hapus-penawaran', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="hapus_id"
                                                                    value="{{ $item->id }}">
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Batalkan</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        let array_penawaran = [];
        let count_items = 0;
        var counterbadges = document.getElementById("counterbadges");

        function counterUp() {
            count_items++;
            counterbadges.innerHTML = count_items;
            $('#hide_penawaran').val(array_penawaran);
        }

        function simpan_penawaran(id_penawaran) {
            console.log("fungsi simpan id penawaran");
            if (array_penawaran.length !== 0) {
                check_array = array_penawaran.indexOf(id_penawaran);
                if (check_array > -1) {
                    array_penawaran.splice(check_array, -1);
                } else {
                    counterUp();
                    array_penawaran.push(id_penawaran)
                }
            } else {
                counterUp();
                array_penawaran.push(id_penawaran)
            }
            console.log(array_penawaran);
            $('#hide_penawaran').val(array_penawaran);
        }

        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
