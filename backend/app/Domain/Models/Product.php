<?php

namespace App\Domain\Models;

use App\Domain\Traits\HasUuid;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuid, HasFactory;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name', 'description', 'quantity', 'price', 'category', 'sku'
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
