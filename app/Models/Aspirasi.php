<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $table = 'aspirasi';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'judul_aspirasi',
        'isi_aspirasi',
        'tanggal_aspirasi',
        'status',
    ];

    protected $casts = [
        'tanggal_aspirasi' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function umpanBalik()
    {
        return $this->hasMany(UmpanBalik::class, 'id_aspirasi', 'id');
    }

    public function progresPerbaikan()
    {
        return $this->hasMany(ProgresPerbaikan::class, 'id_aspirasi', 'id');
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeByKategori($query, $kategoriId)
    {
        return $query->where('id_kategori', $kategoriId);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('id_user', $userId);
    }
}
