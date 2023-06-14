<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataKreditur extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik',
        'name',
        'ktpImage',
        'bpkbImage',
        'jeniskelamin',
        'telepon',
        'tanggalLahir',
        'tempatLahir',
        'pendidikanterakhir',
        'alasan',
        'visible',
        "idLogin"
    ];
    protected $primaryKey = 'idKreditur';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */}
