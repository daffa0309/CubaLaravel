@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Basic DataTables</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Data Tables</li>
    <li class="breadcrumb-item active">Basic DataTables</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Zero Configuration</h5>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="{{ route('base-input') }}" type="button">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Zero Configuration</h5>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="{{ route('base-input') }}" type="button">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display dataTable no-footer" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Zero Configuration</h5>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="{{ route('base-input') }}" type="button">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display dataTable no-footer" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>C7</th>

                                    </tr>
                                </thead>
                                <tbody style="center">
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>&nbsp; {{ $data->name }}</td>
                                            <td>&nbsp; {{ $data->C1 }}</td>
                                            <td>&nbsp;{{ $data->C2 }}</td>
                                            <td>&nbsp;{{ $data->C3 }}</td>
                                            <td>&nbsp;{{ $data->C4 }}</td>
                                            <td>&nbsp;{{ $data->C5 }}</td>
                                            <td>&nbsp;{{ $data->C6 }}</td>
                                            <td>&nbsp;{{ $data->C7 }}</td>
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
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
