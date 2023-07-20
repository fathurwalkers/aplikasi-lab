@extends('layouts.dashboard-layouts')
@section('title', 'RuangLab')
@section('content-prefix', 'Daftar Barang')
@section('content-header', 'Dashboard - Daftar Barang')

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
                                Daftar Barang
                            </b>
                        </h4>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-info d-flex justify-content-end" data-toggle="modal"
                            data-target="#modal_tambah">Tambah Barang</button>
                    </div>

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Peringatan Aksi!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="#" method="POST">
                                    <div class="modal-body">

                                        <div class="container">

                                            <div class="form-row">
                                                {{-- <div class="col-sm-6 col-md-6 col-lg-6"> --}}
                                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                                    <label for="barang_nama">Nama Barang </label>
                                                    <input type="text" class="form-control" id="barang_nama"
                                                        placeholder="Contoh : Djarum Coklat. ">
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                                                    <label for="barang_nama">Nama Barang </label>
                                                    <select class="custom-select my-1 mr-sm-2"
                                                        id="inlineFormCustomSelectPref">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                {{-- </div> --}}
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        @csrf
                                        <input type="hidden" name="hapus_id" value="s">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
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
                                    <th>Barang</th>
                                    <th>Kondisi</th>
                                    <th>Kode</th>
                                    <th>Jumlah Stok</th>
                                    <th>Nilai (Sewa)</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($barang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->barang_nama }}</td>
                                        <td>{{ $item->barang_kondisi }}</td>
                                        <td>{{ $item->barang_kode }}</td>
                                        <td>{{ $item->barang_stok }}</td>
                                        <td>{{ $item->barang_nilai }}</td>
                                        <td class="mx-auto btn-group">
                                            {{-- <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button> --}}
                                            <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#modal_hapus{{ $item->id }}">Hapus</button>

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
                                                                Nama Barang : <b>{{ $item->barang_nama }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('hapus-barang', $item->id) }}"
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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
