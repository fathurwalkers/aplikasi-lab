@extends('layouts.dashboard-layouts')
@section('title', 'RuangLab - Daftar Penawaran')
@section('content-prefix', 'Daftar Penawaran')
@section('content-header', 'Dashboard - Daftar Penawaran')

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
                                    <th>Nama Barang</th>
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
                                        <td>{{ $item->barang->barang_nama }}</td>
                                        <td>{{ $item->penawaran_kode }}</td>
                                        <td>{{ $item->penawaran_status }}</td>
                                        <td>{{ $item->penawaran_harga_total }}</td>
                                        <td class="mx-auto btn-group">
                                            {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button> --}}
                                            {{-- <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button> --}}
                                            <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal"
                                                data-target="#modal_hapus{{ $item->id }}">Hapus</button>
                                            @if ($users->login_level == 'admin')
                                                @if ($item->penawaran_status == 'PENDING')
                                                    <form action="{{ route('konfirmasi-penawaran', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-info">
                                                            Konfirmasi
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

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modal_hapus{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Peringatan
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
