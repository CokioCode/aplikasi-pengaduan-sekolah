<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresPerbaikan extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'progres_perbaikan';

    protected $primaryKey = 'id_progres';

    protected $fillable = [
        'id_aspirasi',
        'keterangan_progres',
        'tanggal_update',
        'status',
    ];

    protected $casts = [
        'tanggal_update' => 'date',
    ];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_aspirasi', 'id_aspirasi');
    }
}
