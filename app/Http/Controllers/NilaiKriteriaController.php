<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiKriteriaController extends Controller
{
    public function getData()
    {
        $items = DataKriteria::pluck('nama', 'idKriteria'); // Ambil data dari kolom 'name' dan 'id' di tabel item

        $data =  DB::table('nilai_kriterias')
            ->leftjoin('data_kriterias', 'nilai_kriterias.id_kriteria', "=", 'data_kriterias.idKriteria')
            ->get();
        return view('forms.sub-kriteria', compact('data', 'items'));
    }
    public  function insert(Request $request)
    {

        $request->validate([
            'namaNilaiKriteria' => ['string', 'min:3', 'max:191', 'required'],
            'kriteria' => ['required'],
            'nilaiKriteria' => [
                'required'
            ],
        ]);
        $data = new NilaiKriteria();
        $data->keterangan = $request->namaNilaiKriteria;
        $data->id_kriteria = $request->kriteria;
        $data->nilai = $request->nilaiKriteria;
        $data->save();
        return back()->with('message', 'Data Sub Kriteria Berhasil ditambahkan');
    }
}
