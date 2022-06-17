<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillabel = [
        'tanggal',
        'jenis',
        'kategori_id',
        'nominal',
        'keterangan'
    ];
    // protected $hidden = [];
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }
}
