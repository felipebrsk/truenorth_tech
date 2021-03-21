<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'category'
    ];

    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Produto::class);
    }
}
