<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
