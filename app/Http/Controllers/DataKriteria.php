<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria as ModelsDataKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataKriteria extends Controller
{
    public function getData()
    {

        $data = ModelsDataKriteria::all();
        return view('forms.data-kriteria', compact('data'));
    }
    public  function insert(Request $request)
    {
        $columnData = ModelsDataKriteria::orderBy('kode', 'desc') // 
            ->value('kode');
        $lastCharacter = substr($columnData, -1);
        $request->validate([
            'namaKriteria' => ['string', 'min:3', 'max:191', 'required'],
            'sifatKriteria' => ['string', 'min:3', 'max:191', 'required'],
            'bobotKriteria' => [
                'required'
            ],
        ]);
        $total = ModelsDataKriteria::sum('bobot');
        if ($total + $request->bobotKriteria >= 1) {
            return back()->with('alert', 'Jumlah Bobot Tidak Boleh melebihi 1');
        } else {
            $data = new ModelsDataKriteria();
            $data->nama = $request->namaKriteria;
            $data->sifat = $request->sifatKriteria;
            $data->bobot = $request->bobotKriteria;
            $data->kode = "C" . $lastCharacter + 1;
            $data->save();
            return back()->with('message', 'Data Kriteria Berhasil ditambahkan');
        }
    }
}
