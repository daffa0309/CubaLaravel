@extends('layouts.simple.master')
@section('title', 'Tambah Kriteria')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Kriteria</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Form Layout</li>
    <li class="breadcrumb-item active">Kriteria</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Kriteria</h5>
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
                            <form method="POST" action="{{ route('insert-data-kriteria') }}" class="theme-form">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="namaKriteria">Nama Kriteria</label>
                                    <div class="col-sm-12">
                                        <input class="form-control @error('namaKriteria') is-invalid @enderror" required
                                            id="namaKriteria" name="namaKriteria" type="text"
                                            placeholder="Input Kriteria">
                                        @error('namaKriteria')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Sifat Kriteria</label>
                                    <select required name="sifatKriteria" class="js-example-basic-single">
                                        <option selected="" disabled="" value="">Pilih Sifat
                                            Kriteria...
                                        </option>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>

                                    </select>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" for="bobotKriteria">Bobot
                                        Kriteria</label>
                                    <div class="col-sm-12">
                                        <input class="form-control @error('bobotKriteria') is-invalid @enderror" required
                                            id="bobotKriteria" name="bobotKriteria" max="1" type="number"
                                            step="0.01" placeholder="Input Kriteria">
                                        @error('bobotKriteria')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
                                                    <th>Name</th>
                                                    <th>Sifat</th>
                                                    <th>Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $data)
                                                    <tr>
                                                        <td>&nbsp; {{ $data->nama }}</td>
                                                        <td>&nbsp; {{ $data->sifat }}</td>
                                                        <td>&nbsp; {{ $data->bobot }}</td>



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
