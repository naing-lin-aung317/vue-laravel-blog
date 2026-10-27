<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nrc extends Model
{
    use HasFactory;

    protected $table = 'nrc';

    protected $fillable = [
        'user_id',
        'township',
        'number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
