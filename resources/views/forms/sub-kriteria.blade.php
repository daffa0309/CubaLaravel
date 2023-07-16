@extends('layouts.simple.master')
@section('title', 'Tambah Kriteria')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Nilai Kriteria</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Form Layout</li>
    <li class="breadcrumb-item active">Nilai Kriteria</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Tambah Nilai Kriteria</h5>
                            </div>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if (session()->has('alert'))
                                <div class="alert alert-danger">
                                    {{ session('alert') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="{{ route('insert-nilai-kriteria') }}" class="theme-form">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="namaNilaiKriteria">Nama
                                            Sub Kriteria</label>
                                        <div class="col-sm-12">
                                            <input class="form-control @error('namaNilaiKriteria') is-invalid @enderror"
                                                required id="namaNilaiKriteria" name="namaNilaiKriteria" type="text"
                                                placeholder="Input Nilai Kriteria">
                                            @error('namaNilaiKriteria')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kriteria</label>
                                        <select required name="kriteria" class="js-example-basic-single">
                                            <option selected="" disabled="" value="">Pilih
                                                Kriteria...
                                            </option>
                                            @foreach ($items as $idKriteria => $nama)
                                                <option value="{{ $idKriteria }}">{{ $nama }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="nilaiKriteria">Nilai Kriteria</label>
                                        <select required name="nilaiKriteria" class="js-example-basic-single">
                                            <option selected="" disabled="" value="">Pilih Nilai
                                                Kriteria...
                                            </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                        </select>
                                        @error('nilaiKriteria')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Zero Configuration  Starts-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Kriteria</h5>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="display" id="basic-2">
                                            <thead>
                                                <tr>
                                                    <th>Nama Sub Kriteria</th>
                                                    <th>Nilai Sub Kriteria</th>
                                                    <th>Nama Kriteria</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $data)
                                                    <tr>
                                                        <td>&nbsp; {{ $data->keterangan }}</td>
                                                        <td>&nbsp; {{ $data->nilai }}</td>
                                                        <td>&nbsp; {{ $data->nama }}</td>



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

            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
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
@endsection
