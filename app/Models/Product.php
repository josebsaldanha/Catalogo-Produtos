<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'nome',
        'descricao',
        'preco',
        'preco_antigo',
        'imagem',
        'estado'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}