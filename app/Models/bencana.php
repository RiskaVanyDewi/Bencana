<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    protected $table = 'bencana'; 
    protected $fillable = [
        'sungai',
        'desa_kelurahan',
        'kecamatan',
        'kabupaten',
        'tahun',
        'dampak',
        'upaya_yang_dilakukan',
        'keterangan',
        'foto',
    ];
    public $timestamps = false;
}
