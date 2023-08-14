<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wawancara extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pelamar():BelongsTo
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function pertanyaan():BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function jawaban():BelongsTo
    {
        return $this->belongsTo(Jawaban::class);
    }
}
