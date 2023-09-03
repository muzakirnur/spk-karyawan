<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hasil extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasilDetail():HasMany
    {
        return $this->hasMany(HasilDetail::class);
    }
}
