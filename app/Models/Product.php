<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'specs',
        'features',
        'category',
    ];

    protected $casts = [
        'specs' => 'array',
        'features' => 'array',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
