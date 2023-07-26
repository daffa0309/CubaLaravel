@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data Kreditur</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data Tables</li>
    <li class="breadcrumb-item active">Data Kreditur</li>
@endsection

@section('content')
    @if (Auth::user()->level == 'admin' && $lengthUsers > 0)
            {{-- Data Modal --}}

        @foreach ($users as $data => $value)
            <div class="modal fade" tabindex="-1" id="getData{{ $value->idKreditur }}" role="dialog" aria-hidden="true"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog  lg"role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Judul Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-section">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="namaKreditur">Nama Kreditur</label>
                                                <input class="form-control" disabled value="{{ $value->name }}"
                                                    name="namaKreditur" id="namaKreditur" type="text"
                                                    placeholder="Masukkan Nama">
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="nik">NIK Kreditur</label>
                                                <input class="form-control" disabled value="{{ $value->nik }}"
                                                    name="nik" id="nik" type="number" required
                                                    placeholder="421563">
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label class="col-sm-3 col-form-label">Foto KTP</label>
                                                <div class="media-img"><img
                                                        style='height: 100%; width: 100%; object-fit: contain'
                                                        src="{{ asset('storage/images/ktp/' . $value->ktpImage) }}"
                                                        alt=""></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="jenisKelamin">Jenis Kelamin</label>
                                                <input class="form-control" disabled value="{{ $value->jeniskelamin }}"
                                                    name="nik" id="nik" type="text" required
                                                    placeholder="421563">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="nomorTelp">Nomor Telp Kreditur</label>
                                                <input class="form-control" required disabled value="{{ $value->telepon }}"
                                                    name="nomorTelp" id="nomorTelp" type="text" placeholder="0821">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="tempatLahir">Tempat Lahir</label>
                                                <input class="form-control" required disabled
                                                    value="{{ $value->tempatLahir }}" name="tempatLahir" id="tempatLahir"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="tanggalLahir">Tanggal Lahir</label>
                                                <input class="form-control" required disabled
                                                    value="{{ $value->tanggalLahir }}" name="tanggalLahir" id="tanggalLahir"
                                                    type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                                                <input class="form-control" required disabled
                                                    value="{{ $value->pendidikanterakhir }}" name="pendidikanterakhir"
                                                    id="pendidikanterakhir" type="text">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="alasan">Alasan</label>
                                                <input class="form-control" required disabled
                                                    value="{{ $value->alasan }}" name="alasan" id="alasan"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="umurKreditur">Umur Kreditur</label>
                                                <select required class="form-select digits" disabled name="umurKreditur"
                                                    id="umurKreditur">
                                                    @switch($value->C6)
                                                        @case('5')
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">46 - 55 </option>
                                                        @break

                                                        @case('4')
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">24 - 26 </option>
                                                        @break

                                                        @case('3')
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">36 - 45 </option>
                                                        @break

                                                        @case('2')
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">17 - 23</option>
                                                        @break

                                                        @case('1')
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">27 - 35</option>
                                                        @break

                                                        @default
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih Umur...
                                                            </option>
                                                    @endswitch


                                                </select>
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="nomorTelp">Tipe Kendaraan</label>
                                                <input class="form-control" required disabled
                                                    value="{{ $value->tipeKendaraan }}" name="modelKendaraan"
                                                    id="modelKendaraan" type="text"
                                                    placeholder="Masukkan Model Kendadraan Anda">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="modelKendaraan">Model Kendaraan</label>
                                                <input class="form-control" required disabled
                                                    value="{{ $value->modelKendaraan }}" name="modelKendaraan"
                                                    id="modelKendaraan" type="text"
                                                    placeholder="Masukkan Model Kendadraan Anda">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="umurKendaraan">Umur Kendaraan</label>
                                                <select required class="form-select digits" disabled name="umurKendaraan"
                                                    id="umurKendaraan">
                                                    @switch($value->C5)
                                                        @case('5')
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">10 Tahun</option>
                                                        @break

                                                        @case('4')
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">7 - 8 Tahun</option>
                                                        @break

                                                        @case('3')
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">5 - 6 Tahun </option>
                                                        @break

                                                        @case('2')
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">3 - 4 Tahun </option>
                                                        @break

                                                        @case('1')
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">1 - 2 Tahun </option>
                                                        @break

                                                        @default
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih Umur
                                                                Kendaraan...
                                                            </option>
                                                    @endswitch


                                                </select>
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label class="col-sm-3 col-form-label">Foto BPKB</label>
                                                <div class="media-img"><img
                                                        style='height: 100%; width: 100%; object-fit: contain'
                                                        src="{{ asset('storage/images/bpkb/' . $value->bpkbImage) }}"
                                                        alt=""></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <select required class="form-select digits" disabled name="pekerjaan"
                                                    id="pekerjaan">
                                                    @switch($value->C3)
                                                        @case('5')
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">PNS</option>
                                                        @break

                                                        @case('4')
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">Karyawan Swasta</option>
                                                        @break

                                                        @case('3')
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">Wiraswasta</option>
                                                        @break

                                                        @case('2')
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">Profesional</option>
                                                        @break

                                                        @case('1')
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">Pensiunan</option>
                                                        @break

                                                        @default
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih
                                                                Pekerjaan...
                                                            </option>
                                                    @endswitch

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="penghasilan">Penghasilan</label>
                                                <select required class="form-select digits" disabled
                                                    value="{{ $value->name }}" name="penghasilan" id="penghasilan">
                                                    @switch($value->C2)
                                                        @case('5')
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">15.000.000 - 50.000.000</option>
                                                        @break

                                                        @case('4')
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">8.000.000 - 14.999.000</option>
                                                        @break

                                                        @case('3')
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">5.500.000 - 7.999.000</option>
                                                        @break

                                                        @case('2')
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">3.500.000 - 5.499.000</option>
                                                        @break

                                                        @case('1')
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">2.500.000 - 3.499.000</option>
                                                        @break

                                                        @default
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih
                                                                Penghasilan...
                                                            </option>
                                                    @endswitch

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="tanggungan">Tanggungan</label>
                                                <select required class="form-select digits" disabled
                                                    value="{{ $value->name }}" name="tanggungan" id="tanggungan">
                                                    <option selected="" disabled="" value="">Pilih
                                                        Tanggungan...
                                                    </option>
                                                    <option value="1">Tidak Ada</option>
                                                    <option value="2">1 Tanggungan</option>
                                                    <option value="3">2 Tanggungan</option>
                                                    <option value="4">3 - 5 Tanggungan</option>
                                                    <option value="5">Lebih dari 5 Tanggungan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="kondisiKendaraan">Kondisi Kendaraan</label>
                                                <select required class="form-select digits" disabled
                                                    value="{{ $value->name }}" name="kondisiKendaraan"
                                                    id="kondisiKendaraan">
                                                    <option selected="" disabled="" value="">Pilih Kondisi
                                                        Kendaraan...
                                                    </option>
                                                    <option value="1">Adanya Kerusakan yang serius</option>
                                                    <option value="2">Perlu Beberapa Perbaikan</option>
                                                    <option value="3">Kondisi Kendaraan wajar, memerlukan perawatan
                                                        Rutin
                                                    </option>
                                                    <option value="4">Kondisi Kendaraan terawat, tidak perlu perbaikan
                                                        signifikan</option>
                                                    <option value="5">Kendaraan dalam kondisi sangat baik, tampak
                                                        seperti
                                                        baru</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="statusTempatTinggal">Status Tempat Tinggal</label>
                                                <select required class="form-select digits" disabled
                                                    value="{{ $value->name }}" name="statusTempatTinggal"
                                                    id="statusTempatTinggal">
                                                    <option selected="" disabled="" value="">Pilih Status
                                                        Tempat
                                                        Tinggal...
                                                    </option>
                                                    <option value="1">Kost</option>
                                                    <option value="2">Kontrak</option>
                                                    <option value="3">Milik Keluarga</option>
                                                    <option value="4">Milik Orang Tua</option>
                                                    <option value="5">Milik Sendiri</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Final Ranking</h5>
                            <div style="margin-left: 1080px">
                                <a class="btn btn-primary" href="{{ route('input-data') }}" type="button">Tambah
                                    Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="basic-2">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Skor</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($finalRank as $final)
                                            <tr
                                                style="@if ($final['finalRank'] >= 1.9) background-color: lightgreen; @else background-color: lightyellow; @endif">
                                                <td>&nbsp; {{ $final['name'] }}</td>

                                                <td>&nbsp; {{ $final['finalRank'] }}</td>
                                                @if ($final['visible'] == 0)
                                                    <td>Menunggu Untuk DiReview </td>
                                                @elseif($final['visible'] == 1)
                                                    <td>Data telah diterima </td>
                                                @endif
                                                <td>&nbsp; &nbsp; <a href="#" class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#getData{{ $final['idKreditur'] }}">
                                                        Lihat Data
                                                    </a>
                                                    <a href="#" class="btn btn-primary edit-btn" data-id="{{ $final['idKreditur'] }}">Edit</a>

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
        </div>
    @elseif($userKreditur > 0)
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Final Ranking</h5>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="{{ route('input-data') }}" type="button">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Tanggal Datang</th>
                                        <th>Nomor Urut</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataUser as $data)
                                            <tr>
                                                <td>&nbsp; {{ $data->name }}</td>
                                                <td>&nbsp; {{ $data->tanggal }}</td>
                                                <td>&nbsp; {{ $data->nomor_urut }}</td>
                                                @if ($data->visible == 0)
                                                <td>Menunggu Untuk DiReview </td>
                                            @elseif($data->visible == 1)
                                                <td>Data telah diterima </td>
                                                @elseif($data->visible == 2)
                                                <td>Data telah ditolak </td>
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
    </div>
    @else
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Final Ranking</h5>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="{{ route('input-data') }}" type="button">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Skor</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function(e) {
            e.preventDefault();
            var dataId = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menerima data ini?')) {
                // Lakukan tindakan redirect ke halaman edit dengan menggunakan dataId
                window.location.href =  dataId + '/update-kreditur';
            }
        });
    });
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
