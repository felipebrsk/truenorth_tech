<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'product',
        'subtitle',
        'brand',
        'model',
        'year',
        'capacity',
        'screen_size',
        'connection_type',
        'screen_functionality',
        'screen_type',
        'resolution',
        'weight',
        'dimension',
        'charging',
        'need_battery',
        'included_battery',
        'time_on',
        'included_charger',
        'RAM',
        'way_use',
        'waterproof',
        'compatibility',
        'price',
        'estoque',
        'new',
        'best_seller',
        'current_inventory',
        'image',
        'description',
        'search_helper',
        'category_id',
        'unity_id',
        'type_id',
        'image_id',
    ];

    use HasFactory;

    public function categories()
    {
        return $this->hasMany(Categoria::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function type()
    {
        return $this->hasMany(Tipo::class);
    }

    public function unities()
    {
        return $this->hasMany(Unidade::class);
    }

    public function scopeRandomProducts($query)
    {
        return $query->inRandomOrder()->take(8);
    }

    public function scopeRandomSimilars($query)
    {
        return $query->inRandomOrder()->take(8);
    }
}
