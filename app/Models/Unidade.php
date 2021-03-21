<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = [
        'unity_type',
    ];

    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Produto::class);
    }
}
