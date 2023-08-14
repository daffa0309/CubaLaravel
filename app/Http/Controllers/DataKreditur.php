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
use Illuminate\Support\Facades\Route;

class DataKreditur extends Controller
{
    private $dataKriteria;

    public function __construct(NilaiKriteriaController $dataKriteria)
    {
        $this->dataKriteria = $dataKriteria;
    }
    function getData()
    {

        $idUser = Auth::user()->id;
        $level =  DB::table('data_krediturs')
            ->leftjoin('users', 'data_krediturs.idLogin', "=", 'users.id')
            ->where('users.id', $idUser)
            ->get();

        $userKreditur = count($level);
        $users =  DB::table('data_krediturs')
            ->leftjoin('data_penilaians', 'data_krediturs.idKreditur', "=", 'data_penilaians.idKreditur')
            ->leftjoin('data_kendaraans', 'data_krediturs.idKreditur', "=", 'data_kendaraans.idKreditur')
            ->get();
        $testData =  DB::table('data_krediturs')
            ->leftjoin('data_perhitungan', 'data_krediturs.idKreditur', "=", 'data_perhitungan.idKreditur')
            ->leftjoin('nilai_kriterias', 'data_perhitungan.idNilaiKriteria', "=", 'nilai_kriterias.id_nilaikriteria')
            ->leftjoin('data_kriterias', 'nilai_kriterias.id_kriteria', "=", 'data_kriterias.idKriteria')
            ->select('data_krediturs.*', 'nilai_kriterias.nilai', 'data_kriterias.sifat', 'data_kriterias.bobot')
            ->get();
        // $testData2 =  DB::table('data_perhitungan')
        // ->leftjoin('nilai_kriterias', 'data_perhitungan.idNilaiKriteria', "=", 'nilai_kriterias.id_nilaikriteria')

        // ->get();
        $transactions = DB::table('nilai_kriterias')
            ->select('id_kriteria', DB::raw('MIN(nilai) as min_nilai'), DB::raw('MAX(nilai) as max_nilai'))
            ->groupBy('id_kriteria')
            ->get();


        $usersWithOrdersAndPayments = DB::table('nilai_kriterias')
            ->select('nilai_kriterias.*', 'data_perhitungan.*', 'data_kriterias.*', 'transaction.*', 'data_krediturs.*')
            ->join(DB::raw('(SELECT * FROM data_perhitungan) as data_perhitungan'), 'nilai_kriterias.id_nilaikriteria', '=', 'data_perhitungan.idNilaiKriteria')
            ->join(DB::raw('(SELECT * FROM data_kriterias) as data_kriterias'), 'nilai_kriterias.id_kriteria', '=', 'data_kriterias.idKriteria')
            ->join(DB::raw('(SELECT id_kriteria, MIN(nilai) as min_nilai ,MAX(nilai) as max_nilai FROM nilai_kriterias INNER JOIN data_perhitungan ON nilai_kriterias.id_nilaikriteria = data_perhitungan.idNilaiKriteria GROUP BY id_kriteria) as transaction '), 'nilai_kriterias.id_kriteria', '=', 'transaction.id_kriteria')
            ->join('data_krediturs', 'data_krediturs.idKreditur', '=', 'data_perhitungan.idKreditur')

            ->get();
        // dd($usersWithOrdersAndPayments);
        // dd($usersWithOrdersAndPayments);
        //Sub query
        // $usersWithTotalOrders = DB::table('nilai_kriterias')
        //     ->joinSub(function ($query) {
        //         $query->from('nilai_kriterias')
        //         ->select('id_kriteria', DB::raw('MIN(nilai) as min_nilai'), DB::raw('MAX(nilai) as max_nilai'))

        //         ->groupBy('id_kriteria');
        //     }, 'transaction', function ($join) {
        //         $join->on('nilai_kriterias.id_kriteria', '=', 'transaction.id_kriteria');
        //     })
        //     ->join('data_perhitungan', 'data_perhitungan.idNilaiKriteria', '=', 'nilai_kriterias.id_nilaikriteria')
        //     ->join('data_kriterias', 'data_kriterias.idKriteria', '=', 'nilai_kriterias.id_kriteria')
        //     ->join('data_krediturs', 'data_krediturs.idKreditur', '=', 'data_perhitungan.idKreditur')

        //     ->select('nilai_kriterias.*', 'transaction.*', "data_perhitungan.*", 'data_kriterias.*', 'data_krediturs.*')
        //     ->get();
        // dd($usersWithTotalOrders);
        $lengthUsers = count($users);
        $data = DB::table('data_penilaians')->select('C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7')->get();
        $maxc1 = DB::table('data_penilaians')->max('C1');
        $maxc2 = DB::table('data_penilaians')->max('C2');
        $maxc3 = DB::table('data_penilaians')->max('C3');
        $maxc4 = DB::table('data_penilaians')->max('C4');
        $maxc5 = DB::table('data_penilaians')->max('C5');
        $maxc6 = DB::table('data_penilaians')->max('C6');
        $maxc7 = DB::table('data_penilaians')->max('C7');
        $minc1 = DB::table('data_penilaians')->min('C1');
        $minc2 = DB::table('data_penilaians')->min('C2');
        $minc3 = DB::table('data_penilaians')->min('C3');
        $minc4 = DB::table('data_penilaians')->min('C4');
        $minc5 = DB::table('data_penilaians')->min('C5');
        $minc6 = DB::table('data_penilaians')->min('C6');
        $minc7 = DB::table('data_penilaians')->min('C7');
        if ($lengthUsers > 0 && Auth::user()->level == 'admin') {

            $level =  DB::table('data_krediturs')
                ->leftjoin('users', 'data_krediturs.idLogin', "=", 'users.id')
                ->get();
            $lengthData = count($level);
            $dataKredit = [];
            foreach ($usersWithOrdersAndPayments as $dataCoba) {
                if (!array_key_exists($dataCoba->idKreditur, $dataKredit)) {
                    $dataKredit[$dataCoba->idKreditur] = [];
                }
                $dataKredit[$dataCoba->idKreditur]['idKreditur'] = $dataCoba->idKreditur;
                $dataKredit[$dataCoba->idKreditur]['visible'] = $dataCoba->visible;

                $dataKredit[$dataCoba->idKreditur]['Nama Kreditur'] = $dataCoba->name;
                $dataKredit[$dataCoba->idKreditur]['Bobot' . $dataCoba->id_kriteria] = $dataCoba->bobot;
                $dataKredit[$dataCoba->idKreditur]['idKriteria'] = $dataCoba->id_kriteria;

                if ($dataCoba->sifat == 'Benefit') {
                    $dataKredit[$dataCoba->idKreditur]['C' . $dataCoba->id_kriteria] = $dataCoba->nilai - $dataCoba->min_nilai != 0 ? ($dataCoba->nilai - $dataCoba->min_nilai) / ($dataCoba->max_nilai - $dataCoba->min_nilai) : 0;
                } else if ($dataCoba->sifat == 'Cost') {
                    $dataKredit[$dataCoba->idKreditur]['C' . $dataCoba->id_kriteria] = $dataCoba->max_nilai - $dataCoba->nilai != 0 ? ($dataCoba->max_nilai - $dataCoba->nilai) / ($dataCoba->max_nilai - $dataCoba->min_nilai) : 0;
                }
            }
            $filtering = $dataKredit[1];
            $resultArray = [];
            $filteredKeys = [];
            // dd($dataKredit);
            foreach ($filtering as $key => $value) {
                if (strpos($key, 'C') === 0) { // Memeriksa apakah kunci dimulai dengan huruf "C"
                    $filteredKeys[] = str_replace('C', '', $key); // Menghilangkan huruf "C"
                }
            }

            // dd($filteredKeys);
            foreach ($filtering as $key => $value) {
                if (strpos($key, 'C') === 0) { // Memeriksa apakah kunci dimulai dengan huruf "C"
                    $resultArray[] = $key; // Menghilangkan huruf "C"
                }
            }

            // dd($resultArray);


            // Mengambil Data Normalisasi
            foreach ($users as $row) {
                $matriks[] = [
                    'idKreditur' => ($row->idKreditur),
                    'name' => ($row->name),
                    'visible' => ($row->visible)
                ];
            }

            //Perbandingan SI dan PI
            $length = count($dataKredit);
            $lengthTest = count($matriks);

            $sipi = [];
            foreach ($dataKredit as $dataKreditur) {
                $sipi[$dataKreditur['idKreditur']] = [];
                foreach ($filteredKeys as $key) {
                    $sipi[$dataKreditur['idKreditur']]['sipi_C' . $key] = $dataKreditur['Bobot' . $key] * $dataKreditur['C' . $key] == 0.0 ? 0 : $dataKreditur['Bobot' . $key] * $dataKreditur['C' . $key];
                }
            }
            // dd($sipiTest);  
       
            $arraysumSI = [];

            foreach ($sipi as $innerArray) {
                $sum = 0;
                foreach ($innerArray as $value) {
                    $sum += $value;
                }
                $arraysumSI[] = $sum;
            }

            $sipipangkat = [];
            foreach ($dataKredit as $dataKreditur) {
                $sipipangkat[$dataKreditur['idKreditur']] = [];
                foreach ($filteredKeys as $key) {
                    $sipipangkat[$dataKreditur['idKreditur']]['sipiPangkat_C' . $key] = (pow($dataKreditur['C' . $key], $dataKreditur['Bobot' . $key] ) == 1.0 ? 1 : pow($dataKreditur['C' . $key], $dataKreditur['Bobot' . $key]));
                }
            }


            // for ($i = 0; $i < $length; $i++) {
            //     $sipi[] = [
            //         // 'name' => ($matriks[$i]['name']),
            //         'C1' => (0.1 * $matriks[$i]['C1'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C1']),
            //         'C2' => (0.2 * $matriks[$i]['C2'] == 0.0 ? 0 : 0.2 * $matriks[$i]['C2']),
            //         'C3' => (0.1 * $matriks[$i]['C3'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C3']),
            //         'C4' => (0.2 * $matriks[$i]['C4'] == 0.0 ? 0 : 0.2 * $matriks[$i]['C4']),
            //         'C5' => (0.2 * $matriks[$i]['C5'] == 0.0 ? 0 : 0.2 * $matriks[$i]['C5']),
            //         'C6' => (0.1 * $matriks[$i]['C6'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C6']),
            //         'C7' => (0.1 * $matriks[$i]['C7'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C7']),

            //     ];
            // }


            // $arraysumSI = [];
            // for ($i = 0; $i < $length; $i++) {
            //     $sumSI = 0;
            //     for ($x = 1; $x < 8; $x++) {
            //         $sumSI = $sumSI + $sipi[$i]['C' . $x];
            //     }
            //     array_push($arraysumSI, $sumSI);
            //     $sipipangkat[] = [
            //         'C1' => (pow($matriks[$i]['C1'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C1'], 0.1)),
            //         'C2' => (pow($matriks[$i]['C2'], 0.2) == 1.0 ? 1 : pow($matriks[$i]['C2'], 0.2)),
            //         'C3' => (pow($matriks[$i]['C3'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C3'], 0.1)),
            //         'C4' => (pow($matriks[$i]['C4'], 0.2) == 1.0 ? 1 : pow($matriks[$i]['C4'], 0.2)),
            //         'C5' => (pow($matriks[$i]['C5'], 0.2) == 1.0 ? 1 : pow($matriks[$i]['C5'], 0.2)),
            //         'C6' => (pow($matriks[$i]['C6'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C6'], 0.1)),
            //         'C7' => (pow($matriks[$i]['C7'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C7'], 0.1)),
            //     ];
            // }

            for ($i = 0; $i < $length; $i++) {
                $namaHasilSiTest[] = [
                    'name' => ($matriks[$i]['name']),
                    'hasilSi' => ($arraysumSI[$i]),
                ];
            }

            // for ($i = 0; $i < $length; $i++) {
            //     $namaHasilSi[] = [
            //         'name' => ($matriks[$i]['name']),
            //         'hasilSi' => ($arraysumSI[$i]),
            //     ];
            // }

            //Get data arraySumPI
            $arraysumPI = [];

            foreach ($sipipangkat as $sipiPangkat) {
                $sumPI = 0;
                foreach ($sipiPangkat as $value) {
                    $sumPI = $sumPI + $value;
                }
                $arraysumPI[] = $sumPI;
            }

            // $arraysumPI = [];

            // for ($i = 0; $i < $lengthTest; $i++) {
            //     $sumPI = 0;
            //     for ($x = 1; $x < 8; $x++) {
            //         // $name =($matriks[$i]['name']);
            //         $sumPI = $sumPI + $sipipangkat[$i]['C' . $x];
            //     }
            //     array_push($arraysumPI, $sumPI);
            // }

            //Penjumlahan PISI
            $jumlahKrit = count($filteredKeys);
            $arraysumPISI = [];
            for ($i = 0; $i < $length; $i++) {
                $sumPISITest = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $sumPISITest = $arraysumPI[$i] + $arraysumSI[$i];
                }
                array_push($arraysumPISI, $sumPISITest);
            }  
            // $arraysumPISI = [];
            // for ($i = 0; $i < $length; $i++) {
            //     $sumPISI = 0;
            //     for ($x = 1; $x < 8; $x++) {
            //         $sumPISI = $arraysumPI[$i] + $arraysumSI[$i];
            //     }
            //     array_push($arraysumPISI, $sumPISI);
            // }
            $jumlahPISI = 0;
            foreach ($arraysumPISI as $numbers) {
                $jumlahPISI += $numbers;
            }


            $arraykaPISI = [];

            for ($i = 0; $i < $length; $i++) {
                $kaSIPI = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $kaSIPI = $arraysumPISI[$i] == 0 ? 0 : $arraysumPISI[$i] / $jumlahPISI;
                }
                array_push($arraykaPISI, $kaSIPI);
            }



            //Mencari Nilai Min dan Max Si dan Pi
            $minSUMSI = min($arraysumSI);
            $minSUMPI = min($arraysumPI);
            $maxSUMSI = max($arraysumSI);
            $maxSUMPI = max($arraysumPI);

            //Mencari Nilai KB
            $arraykbPISI = [];

            for ($i = 0; $i < $length; $i++) {
                $kbSIPI = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $kbSIPI = $arraysumSI[$i] && $minSUMSI && $arraysumPI[$i] && $minSUMPI != 0 ? ($arraysumSI[$i] / $minSUMSI) + ($arraysumPI[$i] / $minSUMPI) : 0;
                }
                array_push($arraykbPISI, $kbSIPI);
            }

            // Mencari Nilai Kc
            $arraykcPISI = [];

            for ($i = 0; $i < $length; $i++) {
                $kcSIPI = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $kcSIPI = $arraysumSI[$i] && $arraysumPI[$i] != 0 ?  ((0.5 * $arraysumSI[$i]) + (0.5 * $arraysumPI[$i])) / ((0.5 * $maxSUMSI) + (0.5 * $maxSUMPI)) : 0;
                }
                array_push($arraykcPISI, $kcSIPI);
            }
            // Mencari Perkalian antara Ka Kb dan Kc
            $arrayKaKbKc = [];
            for ($i = 0; $i < $length; $i++) {
                $perkalianKaKbKc = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $perkalianKaKbKc = $arraykaPISI[$i] * $arraykbPISI[$i] * $arraykcPISI[$i];
                }
                array_push($arrayKaKbKc, $perkalianKaKbKc);
            }

            // Mencari Tambah Antara Ka Kb dan Kc
            $arrayKaKbKcPlus = [];
            for ($i = 0; $i < $length; $i++) {
                $penambahKaKbKc = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $penambahKaKbKc = $arraykaPISI[$i] + $arraykbPISI[$i] + $arraykcPISI[$i];
                }
                array_push($arrayKaKbKcPlus, $penambahKaKbKc);
            }

            $finalRanking = [];
            for ($i = 0; $i < $length; $i++) {
                $kSIPI = 0;
                for ($x = 1; $x < $jumlahKrit; $x++) {
                    $kSIPI = ((pow($arrayKaKbKc[$i], 0.3))) + ((0.3) * ($arrayKaKbKcPlus[$i]));
                }
                array_push($finalRanking, $kSIPI);
            }
            for ($i = 0; $i < $length; $i++) {
                $finalRank[] = [
                    'idKreditur' => ($matriks[$i]['idKreditur']),
                    'name' => ($matriks[$i]['name']),
                    'finalRank' => (($finalRanking[$i])),
                    'visible' => ($matriks[$i]['visible']),

                ];
            }

            return view('tables.data-kreditur', compact('matriks', 'sipi', 'arraysumSI', 'arraysumPI', 'arraysumPISI', 'finalRank', 'users', 'lengthUsers', 'lengthData'));
        } elseif ($userKreditur > 0 && Auth::user()->level != 'admin') {
            $route = Route::current();
            $nextDate = $level[0]->tanggal;
            alert()->success('Success', 'Data Kamu sudah disetujui, Silahkan Datang Pada Tanggal' . $nextDate);

            $dataUser =  DB::table('data_krediturs')
                ->leftjoin('users', 'data_krediturs.idLogin', "=", 'users.id')
                ->where('users.id', $idUser)
                ->get();
            return view('tables.data-kreditur', compact('userKreditur', 'dataUser',  'users', 'lengthUsers'));
        } else {
            return view('tables.data-kreditur', compact('userKreditur', "lengthUsers"));
        }
        // return view('tables.data-kreditur', ['users' => $users,'matrix' => $matriks]);
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
        $umurKreditur = $request->input('umurKreditur');
        $umurKendaraan = $request->input('umurKendaraan');
        $pekerjaan = $request->input('pekerjaan');
        $penghasilan = $request->input('penghasilan');
        $tanggungan = $request->input('tanggungan');
        $kondisiKendaraan = $request->input('kondisiKendaraan');
        $statusTempatTinggal = $request->input('statusTempatTinggal');
        $dataPenilaian = array('C1' => $statusTempatTinggal, "C2" => $penghasilan, "C3" => $pekerjaan, "C4" => $kondisiKendaraan, "C5" => $umurKendaraan, "C6" => $umurKreditur, "C7" => $tanggungan, "idKreditur" => $id);
        DB::table('data_penilaians')->insert($dataPenilaian);
        alert()->success('Success', 'Data Berhasil Disimpan !');

        return redirect()->back();
    }


    public function updateData($id, $visible)
    {
        $data = DataKrediturs::where('idKreditur', $id)->first();
        $data->visible = $visible;
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
            $nextDate = Carbon::tomorrow();
            $queueNumber = DataKrediturs::whereDate('tanggal', $nextDate)->max('nomor_urut') + 1;
        }
        $data->tanggal = $nextDate;
        $data->nomor_urut = $queueNumber;
        $data->save();
        alert()->success('Success', 'Data Berhasil Diupdate !');
    }
    public function tolakData($id)
    {
        $data = DataKrediturs::where('idKreditur', $id)->first();
        $data->visible = 2;
        $data->save();
        alert()->success('Success', 'Data Berhasil Diupdate !');
        return redirect()->back();
    }
}
