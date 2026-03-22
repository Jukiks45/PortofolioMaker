<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'file_path',
        'image_path',
        'category_name',
        'status',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function portfolios()
    {
        return $this->hasMany(\App\Models\Portfolio::class);
    }
}
