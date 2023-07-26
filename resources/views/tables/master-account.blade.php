@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Data Akun</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data Akun</li>
    <li class="breadcrumb-item active">Data Akun</li>
@endsection

@section('content')
    @foreach ($users as $data => $value)
        <div class="modal fade" tabindex="-1" id="getData{{ $value->id }}" role="dialog" aria-hidden="true"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog  lg"role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Akun</h5>
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
                                            <label for="firstName">First Name</label>
                                            <input class="form-control"  value="{{ $value->FirstName }}"
                                                name="firstName" id="firstName" type="text"
                                                placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="lastName">Last Name</label>
                                            <input class="form-control"  value="{{ $value->LastName }}" name="lastName"
                                                id="lastName" type="text" required placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-12">
                                            <label for="email">Email</label>
                                            <input class="form-control"  value="{{ $value->email }}" name="email"
                                                id="email" type="email" required placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="level">Level</label>
                                            <input class="form-control"  value="{{ $value->level }}" name="level"
                                                id="level" type="text" required placeholder="Level">
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
                                        <th>Fist Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>&nbsp; {{ $data->FirstName }}</td>
                                            <td>&nbsp; {{ $data->LastName }}</td>
                                            <td>&nbsp; {{ $data->email }}</td>
                                            <td>&nbsp; {{ $data->level }}</td>

                                            
                                            <td>&nbsp; &nbsp; <a href="#" class="btn btn-primary btn-sm"
                                                    data-toggle="modal" data-target="#getData{{ $data->id }}">
                                                    Lihat Data
                                                </a>
                                                <a href="#" class="btn btn-primary edit-btn"
                                                    data-id="{{$data->id}}">Edit</a>

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
                    window.location.href = dataId + '/update-kreditur';
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
