<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subCriteria():BelongsTo
    {
        return $this->belongsTo(SubCriteria::class);
    }
}
