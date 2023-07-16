<?php

namespace App\Http\Controllers;

use App\Models\DataKreditur as DataKrediturs;
use App\Models\NilaiKriteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\NilaiKriteriaController;

class DataKreditur extends Controller
{
    private $dataKriteria;

    public function __construct(NilaiKriteriaController $dataKriteria)
    {
        $this->dataKriteria = $dataKriteria;
    }

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
        $idLogin = Auth::user()->id;
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
        $data = array('name' => $namaKreditur, "nik" => $nik, "jeniskelamin" => $jenisKelamin, "telepon" => $nomorTelp, "tanggalLahir" => $tanggalLahir, "tempatLahir" => $tempatLahir,  "alasan" => $alasan, "pendidikanTerakhir" => $pendidikanTerakhir, "ktpImage" => $ktp, "bpkbImage" => $bpkb, "idLogin" => $idLogin);
        $id = DB::table('data_krediturs')->insertGetId($data);

        //Data Kendaraan
        $tipeKendaraan = $request->input('tipeKendaraan');
        $modelKendaraan = $request->input('modelKendaraan');
        $dataKendaraan = array('tipeKendaraan' => $tipeKendaraan, "modelKendaraan" => $modelKendaraan, "idKreditur" => $id);
        DB::table('data_kendaraans')->insert($dataKendaraan);

        //Data Penilaian
        // $umurKreditur = $request->input('umurKreditur');
        // $umurKendaraan = $request->input('umurKendaraan');
        // $pekerjaan = $request->input('pekerjaan');
        // $penghasilan = $request->input('penghasilan');
        // $tanggungan = $request->input('tanggungan');
        // $kondisiKendaraan = $request->input('kondisiKendaraan');
        // $statusTempatTinggal = $request->input('statusTempatTinggal');
        // $dataPenilaian = array('C1' => $statusTempatTinggal, "C2" => $penghasilan, "C3" => $pekerjaan, "C4" => $kondisiKendaraan, "C5" => $umurKendaraan, "C6" => $umurKreditur, "C7" => $tanggungan, "idKreditur"=> $id);
        // DB::table('data_penilaians')->insert($dataPenilaian);
        alert()->success('Success', 'Data Berhasil Disimpan !');

        return redirect()->back();
    }
    public function getData()
    {
        $data = $this->dataKriteria->getData();

        $datas = $data->data;
        foreach ($datas as $row) {
            dd($row);
        }
        return view('forms.input-data', compact('datas'));
    }

    public function updateData($id)
    {
        $data = DataKrediturs::where('idKreditur', $id)->first();
        $data->visible = 1;
        $nextDate = '';
        $queueNumber = "0";
        if (Carbon::now()->isWeekday()) {
            // Cek apakah sudah mencapai batas maksimal antrian per hari
            if (DataKrediturs::whereDate('tanggal', Carbon::now())->count() >= 15 && Carbon::now()->format('H:i') >= '16:00') {
                // Jika sudah mencapai batas maksimal, tambahkan 1 hari ke tanggal
                $nextDate = Carbon::tomorrow();
            } else {
                // Jika masih belum mencapai batas maksimal, gunakan tanggal hari ini
                $nextDate = Carbon::now();
            }

            // Generate nomor antrian baru
            $queueNumber = DataKrediturs::whereDate('tanggal', $nextDate)->max('nomor_urut') + 1;
        } else {
        }
        $data->tanggal = $nextDate;
        $data->nomor_urut = $queueNumber;
        $data->save();
        alert()->success('Success', 'Data Berhasil Diupdate !');
        return redirect()->back();
    }
}
