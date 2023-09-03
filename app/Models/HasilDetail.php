<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasil():BelongsTo
    {
        return $this->belongsTo(Hasil::class);
    }

    public function pelamar():BelongsTo
    {
        return $this->belongsTo(Pelamar::class);
    }
}
