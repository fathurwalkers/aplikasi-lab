@extends('layouts.dashboard-layouts')
@section('title', 'RuangLab - Buat Penawaran')
@section('content-prefix', 'Buat Penawaran')
@section('content-header', 'Dashboard - Buat Penawaran')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables') }}/datatables.min.css"> --}}
    <link href="{{ asset('datatables') }}/datatables.min.css" rel="stylesheet">
@endpush

@section('main-content')

    <div class="card mb-4">
        <div class="card-body">
            <div class="container">

                <form action="{{ route('proses-penawaran') }}" method="POST">
                    @csrf
                    <input type="hidden" id="hide_barang" name="hide_barang">
                    <input type="hidden" id="hide_harga" name="hide_harga">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="penawaran_deskripsi">Deskripsi Penawaran : </label>
                            <input type="text" name="penawaran_deskripsi" class="form-control" id="penawaran_deskripsi"
                                placeholder="Tuliskan deskripsi tentang pengadaan atau peminjaman barang anda...">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info" id="button_proses">
                                Proses Penawaran
                            </button>
                        </div>
                    </div>
                </form>

                <hr />

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h5>
                            <b>
                                Pilih Barang
                            </b>
                        </h5>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-end">
                        <button type="button" class="badge badge-lg badge-primary mr-1">
                            <b>Total Harga :
                                <span id="badgeshargatotal">0</span>
                            </b>
                        </button>
                        <button type="button" class="badge badge-lg badge-primary">
                            <b>Total Pilihan :
                                <span id="counterbadges">0</span>
                            </b>
                        </button>
                    </div>

                </div>

                <hr />
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="display table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Barang</th>
                                    <th>Kode</th>
                                    <th>Kondisi</th>
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
                                            <button type="button" class="btn btn-sm btn-info"
                                                onclick="simpan_barang({{ $item->id }},{{ $item->barang_nilai }})">PILIH</button>
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

    <div class="card mb-4">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        dkwokdowkdowkdo
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('datatables') }}/datatables.min.js"></script>
    <script>
        let array_barang = [];
        let harga_total = 0;
        let count_items = 0;
        var counterbadges = document.getElementById("counterbadges");
        var badgeshargatotal = document.getElementById("badgeshargatotal");

        function counterUp() {
            count_items++;
            counterbadges.innerHTML = count_items;
            // badgeshargatotal.innerHTML = harga_total;
            $('#hide_barang').val(array_barang);
            $('#hide_harga').val(harga_total);
            $('#badgeshargatotal').html(harga_total);
        }

        function simpan_barang(id_barang, harga_barang) {
            console.log("fungsi simpan barang");
            if (array_barang.length !== 0) {
                check_array = array_barang.indexOf(id_barang);
                if (check_array > -1) {
                    array_barang.splice(check_array, -1);
                } else {
                    counterUp();
                    harga_total += parseInt(harga_barang);
                    array_barang.push(id_barang)
                }
            } else {
                counterUp();
                harga_total += parseInt(harga_barang);
                array_barang.push(id_barang)
            }
            $('#hide_barang').val(array_barang);
            $('#hide_harga').val(harga_total);
            $('#badgeshargatotal').html(harga_total);
        }

        $(document).ready(function() {
            $('#example').DataTable();
        });

        // $('#button_proses').on("click", function() {
        //     // console.log(valuekategori)
        //     let token = $('input[name="_token"]').val();
        //     $.ajax({
        //         type: 'POST',
        //         url: '{{ route('proses-penawaran') }}',
        //         data: {
        //             '_token': token,
        //             'array_barang': array_barang,
        //             'harga_total': harga_total,
        //         },
        //         success: function(data) {
        //             console.log(hasil_proses_array);
        //             console.log(hasil_proses_harga);
        //             console.log('success');
        //         }
        //     });
        // });
    </script>
@endpush
