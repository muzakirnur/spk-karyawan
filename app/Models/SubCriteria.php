<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penilaian():HasMany
    {
        return $this->hasMany(Penilaian::class);
    }
}
