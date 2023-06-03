<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataKreditur extends Controller
{
    public function insert(Request $request)
    {
        $ktp = "";
        $bpkb = "";
        $namaKreditur = $request->input('namaKreditur');
        $nik = $request->input('nik');
        $jenisKelamin = $request->input('jenisKelamin');
        $nomorTelp = $request->input('nomorTelp');
        $tanggalLahir = $request->input('tanggalLahir');
        $tempatLahir = $request->input('tempatLahir');
        $alasan = $request->input('alasan');
        $pendidikanTerakhir = $request->input('pendidikanTerakhir');
        if ($request->hasFile('ktp')) {
            $destination_path = 'public/images/ktp';
            $image = $request->file('ktp');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('ktp')->storeAs($destination_path, $image_name);
            $ktp = $image_name;
        }
        if ($request->hasFile('bpkb')) {
            $destination_path = 'public/images/bpkb';
            $image = $request->file('bpkb');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('bpkb')->storeAs($destination_path, $image_name);
            $bpkb = $image_name;
        }
        $data = array('name' => $namaKreditur, "nik" => $nik, "jeniskelamin" => $jenisKelamin, "telepon" => $nomorTelp, "tanggalLahir" => $tanggalLahir, "tempatLahir" => $tempatLahir,  "alasan" => $alasan, "pendidikanTerakhir" => $pendidikanTerakhir, "ktpImage" => $ktp, "bpkbImage" => $bpkb);
        $id = DB::table('data_krediturs')->insertGetId($data);

        //Data Kendaraan
        $tipeKendaraan = $request->input('tipeKendaraan');
        $modelKendaraan = $request->input('modelKendaraan');
        $dataKendaraan = array('tipeKendaraan' => $tipeKendaraan, "modelKendaraan" => $modelKendaraan, "idKreditur"=> $id);
        DB::table('data_kendaraans')->insert($dataKendaraan);

        //Data Penilaian
        $umurKreditur = $request->input('umurKreditur');
        $umurKendaraan = $request->input('umurKendaraan');
        $pekerjaan = $request->input('pekerjaan');
        $penghasilan = $request->input('penghasilan');
        $tanggungan = $request->input('tanggungan');
        $namaPemilikKendaraan = $request->input('namaPemilikKendaraan');
        $statusTempatTinggal = $request->input('statusTempatTinggal');
        $dataPenilaian = array('C1' => $statusTempatTinggal, "C2" => $penghasilan, "C3" => $pekerjaan, "C4" => $namaPemilikKendaraan, "C5" => $umurKendaraan, "C6" => $umurKreditur, "C7" => $tanggungan, "idKreditur"=> $id);
        DB::table('data_penilaians')->insert($dataPenilaian);
        return redirect()->route('index');
    }
}
