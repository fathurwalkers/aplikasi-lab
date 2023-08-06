@extends('layouts.dashboard-layouts')
@section('title', 'RuangLab')
@section('content-prefix', 'Daftar Layanan Jasa')
@section('content-header', 'Dashboard - Daftar Layanan Jasa')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h4>
                            <b>
                                Daftar Layanan Jasa
                            </b>
                        </h4>
                    </div>

                    @if ($users->login_level == 'admin')
                        <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-info d-flex justify-content-end" data-toggle="modal"
                                data-target="#modal_tambah">Tambah Layanan Jasa</button>
                        </div>
                    @endif

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">
                                        Peringatan Aksi!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="{{ route('tambah-jasa') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="container">

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <label for="jasa_nama_alat">
                                                        Nama Alat
                                                    </label>
                                                    <input type="text" class="form-control" id="jasa_nama_alat"
                                                        name="jasa_nama_alat">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <label for="jasa_harga_care">Jumlah
                                                        Stok</label>
                                                    <input type="number" class="form-control" id="jasa_harga_care"
                                                        name="jasa_harga_care">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <label for="jasa_harga_cleaning">Nilai
                                                        (Harga
                                                        Sewa)
                                                    </label>
                                                    <input type="number" class="form-control" id="jasa_harga_cleaning"
                                                        name="jasa_harga_cleaning">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                    <label for="jasa_harga_kalibrasi">Jumlah
                                                        Stok</label>
                                                    <input type="number" class="form-control" id="jasa_harga_kalibrasi"
                                                        name="jasa_harga_kalibrasi">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-primary">Ubah
                                            Data</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- END Modal Tambah -->

                </div>

                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Pelayanan</th>
                                    <th>Care (CAR)</th>
                                    <th>Cleaning (CLEAN)</th>
                                    <th>Kalibrasi (CAL)</th>
                                    <th>Tarif Paket Lengkap (CAR + CLEAN + CAL)</th>
                                    @if ($users->login_level == 'admin')
                                        <th>Opsi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($jasa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->jasa_nama_alat }}</td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($item->jasa_harga_care, 2, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($item->jasa_harga_cleaning, 2, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($item->jasa_harga_kalibrasi, 2, ',', '.') }}
                                        </td>
                                        <td class="">
                                            @php
                                                $sum_total = $item->jasa_harga_care + $item->jasa_harga_cleaning + $item->jasa_harga_kalibrasi;
                                            @endphp
                                            {{ 'Rp ' . number_format($sum_total, 2, ',', '.') }}
                                        </td>
                                        @if ($users->login_level == 'admin')
                                            <td class="mx-auto btn-group">
                                                {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button> --}}
                                                <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal"
                                                    data-target="#modal_ubah{{ $item->id }}">Ubah</button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#modal_hapus{{ $item->id }}">Hapus</button>


                                                <!-- Modal Ubah -->
                                                <div class="modal fade" id="modal_ubah{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabelLogout"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                    Peringatan Aksi!</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form action="{{ route('ubah-jasa', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <div class="container">

                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12">
                                                                                <label for="jasa_nama_alat">
                                                                                    Nama Alat
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="jasa_nama_alat"
                                                                                    name="jasa_nama_alat"
                                                                                    value="{{ $item->jasa_nama_alat }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12">
                                                                                <label for="jasa_harga_care">Jumlah
                                                                                    Stok</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="jasa_harga_care"
                                                                                    name="jasa_harga_care"
                                                                                    value="{{ $item->jasa_harga_care }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12">
                                                                                <label for="jasa_harga_cleaning">Nilai
                                                                                    (Harga
                                                                                    Sewa)
                                                                                </label>
                                                                                <input type="number" class="form-control"
                                                                                    id="jasa_harga_cleaning"
                                                                                    name="jasa_harga_cleaning"
                                                                                    value="{{ $item->jasa_harga_cleaning }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12">
                                                                                <label for="jasa_harga_kalibrasi">Jumlah
                                                                                    Stok</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="jasa_harga_kalibrasi"
                                                                                    name="jasa_harga_kalibrasi"
                                                                                    value="{{ $item->jasa_harga_kalibrasi }}">
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Batalkan</button>
                                                                    <button type="submit" class="btn btn-primary">Ubah
                                                                        Data</button>
                                                                </div>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Modal Ubah -->

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="modal_hapus{{ $item->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabelLogout">
                                                                    Peringatan
                                                                    Aksi!</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus item ini?
                                                                    <br>
                                                                    Nama Barang : <b>{{ $item->barang_nama }}</b>
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('hapus-jasa', $item->id) }}"
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
                                        @endif
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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
