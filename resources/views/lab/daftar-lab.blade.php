@extends('layouts.dashboard-layouts')
@section('title', 'Ujian Kepolisian')
@section('content-prefix', 'Daftar Lab')
@section('content-header', 'Dashboard - Daftar Lab')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="card mb-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <h4>
                        <b>
                            Daftar Lab
                        </b>
                    </h4>
                </div>
                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Lab</th>
                                    <th>Kode Lab</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Nilai (Sewa)</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($lab as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->lab_nama }}</td>
                                    <td>{{ $item->lab_kode }}</td>
                                    <td>{{ $item->lab_penanggung_jawab }}</td>
                                    <td>{{ $item->lab_nilai }}</td>
                                    <td class="mx-auto btn-group">
                                        <button type="button" class="btn btn-sm btn-success mr-1">Lihat</button>
                                        <button type="button" class="btn btn-sm btn-info mr-1">Ubah</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#modal_hapus{{ $item->id }}">Hapus</button>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="modal_hapus{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabelLogout">Peringatan Aksi!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus item ini?
                                                            <br>
                                                            Lab : <b>{{ $item->lab_nama }}</b>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('hapus-lab', $item->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="hapus_id" value="{{ $item->id }}">
                                                            <button type="button" class="btn btn-outline-danger"
                                                            data-dismiss="modal">Batalkan</button>
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
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
