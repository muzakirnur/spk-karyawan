<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pelamar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tesTeori():HasMany
    {
        return $this->hasMany(TesTeori::class);
    }

    public function wawancara():HasMany
    {
        return $this->hasMany(Wawancara::class);
    }

    public function penilaian():HasMany
    {
        return $this->hasMany(Penilaian::class);
    }

    public function hasilDetail():HasOne
    {
        return $this->hasOne(HasilDetail::class);
    }
}
