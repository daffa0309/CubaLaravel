<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function getData()
    {
        $users =  DB::table('data_krediturs')
            ->leftjoin('data_penilaians', 'data_krediturs.idKreditur', "=", 'data_penilaians.idKreditur')
            ->get();
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
        // Mengambil Data Normalisasi
        foreach ($users as $row) {
            $matriks[] = [
             'name' => ($row->name),
                'C1' => ($row->C1 - $minc1 == 0 ? 0 : ($row->C1 - $minc1) / ($maxc1 - $minc1)),
                'C2' => ($row->C2 - $minc2 == 0 ? 0 : ($row->C2 - $minc2) / ($maxc2 - $minc2)),
                'C3' => ($row->C3 - $minc3 == 0 ? 0 : ($row->C3 - $minc3) / ($maxc3 - $minc3)),
                'C4' => ($row->C4 - $minc4 == 0 ? 0 : ($row->C4 - $minc4) / ($maxc4 - $minc4)),
                'C5' => ($maxc5   - $row->C5  == 0 ? 0 : ($maxc5   - $row->C5) / ($maxc5 - $minc5)),
                'C6' => ($maxc6   - $row->C6  == 0 ? 0 : ($maxc6   - $row->C6) / ($maxc6 - $minc6)),
                'C7' => ($maxc7   - $row->C7  == 0 ? 0 : ($maxc7   - $row->C7) / ($maxc7 - $minc7)),
            ];
        }
        //Perbandingan SI dan PI

        $length = count($matriks);
        for ($i = 0; $i < $length; $i++) {
            $sipi[] = [
                // 'name' => ($matriks[$i]['name']),
                'C1' => (0.1 * $matriks[$i]['C1'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C1']),
                'C2' => (0.2 * $matriks[$i]['C2'] == 0.0 ? 0 : 0.2 * $matriks[$i]['C2']),
                'C3' => (0.1 * $matriks[$i]['C3'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C3']),
                'C4' => (0.2 * $matriks[$i]['C4'] == 0.0 ? 0 : 0.2 * $matriks[$i]['C4']),
                'C5' => (0.2 * $matriks[$i]['C5'] == 0.0 ? 0 : 0.2 * $matriks[$i]['C5']),
                'C6' => (0.1 * $matriks[$i]['C6'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C6']),
                'C7' => (0.1 * $matriks[$i]['C7'] == 0.0 ? 0 : 0.1 * $matriks[$i]['C7']),

            ];
        }
        $arraysumSI = [];
        for ($i = 0; $i < $length; $i++) {
            $sumSI = 0;
            for ($x = 1; $x < 8; $x++) {
                $sumSI = $sumSI + $sipi[$i]['C' . $x];
            }
            array_push($arraysumSI, $sumSI);
            $sipipangkat[] = [
                'C1' => (pow($matriks[$i]['C1'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C1'], 0.1)),
                'C2' => (pow($matriks[$i]['C2'], 0.2) == 1.0 ? 1 : pow($matriks[$i]['C2'], 0.2)),
                'C3' => (pow($matriks[$i]['C3'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C3'], 0.1)),
                'C4' => (pow($matriks[$i]['C4'], 0.2) == 1.0 ? 1 : pow($matriks[$i]['C4'], 0.2)),
                'C5' => (pow($matriks[$i]['C5'], 0.2) == 1.0 ? 1 : pow($matriks[$i]['C5'], 0.2)),
                'C6' => (pow($matriks[$i]['C6'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C6'], 0.1)),
                'C7' => (pow($matriks[$i]['C7'], 0.1) == 1.0 ? 1 : pow($matriks[$i]['C7'], 0.1)),
            ];
        }

        for ($i = 0; $i < $length; $i++) {
            $namaHasilSi[] = [
             'name' => ($matriks[$i]['name']),
                'hasilSi' => ($arraysumSI[$i]),
            ];
        }
        dd($arraysumSI);

        $arraysumPI = [];

        for ($i = 0; $i < $length; $i++) {
            $sumPI = 0;
            for ($x = 1; $x < 8; $x++) {
                // $name =($matriks[$i]['name']);
                $sumPI = $sumPI + $sipipangkat[$i]['C' . $x];
            }
            array_push($arraysumPI, $sumPI);
        }
        $arraysumPISI = [];
        for ($i = 0; $i < $length; $i++) {
            $sumPISI = 0;
            for ($x = 1; $x < 8; $x++) {
                $sumPISI = $arraysumPI[$i] + $arraysumSI[$i];
            }
            array_push($arraysumPISI, $sumPISI);
        }
        $jumlahPISI = 0;
        foreach($arraysumPISI as $numbers){
            $jumlahPISI += $numbers;
        }
       

        $arraykaPISI = [];

        for ($i = 0; $i < $length; $i++) {
            $kaSIPI = 0;
            for ($x = 1; $x < 8; $x++) {
                $kaSIPI = $arraysumPISI[$i] / $jumlahPISI;
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
            for ($x = 1; $x < 8; $x++) {
                $kbSIPI = ($arraysumSI[$i] / $minSUMSI) + ($arraysumPI[$i] / $minSUMPI);
            }
            array_push($arraykbPISI, $kbSIPI);
        }

        // Mencari Nilai Kc
        $arraykcPISI = [];

        for ($i = 0; $i < $length; $i++) {
            $kcSIPI = 0;
            for ($x = 1; $x < 8; $x++) {
                $kcSIPI = ((0.5* $arraysumSI[$i])+(0.5 * $arraysumPI[$i])) / ((0.5 * $maxSUMSI) + (0.5 * $maxSUMPI));
            }
            array_push($arraykcPISI, $kcSIPI);
        }
        // Mencari Perkalian antara Ka Kb dan Kc
        $arrayKaKbKc = [];
        for ($i = 0; $i < $length; $i++) {
            $perkalianKaKbKc = 0;
            for ($x = 1; $x < 8; $x++) {
                $perkalianKaKbKc = $arraykaPISI[$i] * $arraykbPISI[$i] * $arraykcPISI[$i];
            }
            array_push($arrayKaKbKc, $perkalianKaKbKc);
        }

        // Mencari Tambah Antara Ka Kb dan Kc
        $arrayKaKbKcPlus = [];
        for ($i = 0; $i < $length; $i++) {
            $penambahKaKbKc = 0;
            for ($x = 1; $x < 8; $x++) {
                $penambahKaKbKc = $arraykaPISI[$i] + $arraykbPISI[$i] + $arraykcPISI[$i];
            }
            array_push($arrayKaKbKcPlus, $penambahKaKbKc);
        }

        $finalRanking = [];
        for ($i = 0; $i < $length; $i++) {
            $kSIPI = 0;
            for ($x = 1; $x < 8; $x++) {
                $kSIPI = ((pow($arrayKaKbKc[$i], 0.3))) + ((0.3) * ($arrayKaKbKcPlus[$i]));
            }
            array_push($finalRanking, $kSIPI);
        }
            return view('tables.datatable-basic-init', compact('matriks', 'sipi','arraysumSI','arraysumPI','arraysumPISI'));

        // return view('tables.datatable-basic-init', ['users' => $users,'matrix' => $matriks]);
    }
    function signUp(Request $request)
    {
        $rules = [
            'firstName' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('sign-up')->withInput()->withErrors($validator);
        } else {
            $data = $request->all();
            $user = new User;
            $user->FirstName = $data['firstName'];
            $user->LastName = $data['lastName'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->level = 'user';
            $user->remember_token = Str::random(60);
            $user->save();
            return redirect('authentication/login')->with('status', "Sign up success");
        }
    }
}
