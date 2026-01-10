<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'umpan_balik';

    protected $primaryKey = 'id_umpan_balik';

    protected $fillable = [
        'id_aspirasi',
        'id_user',
        'isi_umpan_balik',
        'tanggal_umpan_balik',
    ];

    protected $casts = [
        'tanggal_umpan_balik' => 'date',
    ];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_aspirasi', 'id_aspirasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
