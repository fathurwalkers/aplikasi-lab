@extends('layouts.dashboard-layouts')
@section('title', 'RuangLab - Daftar Invoice')
@section('content-prefix', 'Daftar Invoice')
@section('content-header', 'Dashboard - Daftar Invoice')

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
                                Daftar Invoice
                            </b>
                        </h4>
                    </div>

                    {{-- <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
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
                    </div> --}}
                </div>

                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Pembuat Penawaran</th>
                                    <th>Kode Invoice</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($invoice as $item)
                                    <tr>
                                        <td class="text-center text-dark">{{ $loop->iteration }}</td>
                                        <td class="text-center text-dark">{{ $item->penawaran->data->data_nama }}</td>
                                        <td class="text-center text-dark">{{ $item->invoice_kode }}</td>
                                        @switch($item->invoice_status)
                                            @case('NO')
                                                <td class="text-center text-dark">Belum dibayar</td>
                                            @break

                                            @case('YES')
                                                <td class="text-center text-dark">Sudah dibayar</td>
                                            @break
                                        @endswitch
                                        <td class="mx-auto d-flex justify-content-center">
                                            {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button> --}}
                                            {{-- <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button> --}}
                                            <form action="{{ route('cetak-invoice') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_invoice" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-sm btn-info mr-2">Cetak
                                                    Invoice</button>
                                            </form>

                                            @if ($users->login_level == 'admin')
                                                @if ($item->invoice_status == 'NO')
                                                    <form action="{{ route('konfirmasi-pembayaran', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id_invoice" value="{{ $item->id }}">
                                                        <button type="submit" class="btn btn-sm btn-info ml-1">
                                                            Konfirmasi Pembayaran</button>
                                                    </form>
                                                @endif
                                            @endif

                                            @if ($item->invoice_status == 'YES')
                                                <form action="{{ route('cetak-kwitansi') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_invoice" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-sm btn-info ml-1">Cetak
                                                        Kwitansi</button>
                                                </form>
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
