<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'type',
    ];
    
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
