<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Product;
use App\Models\RawProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['raw_product_id', 'size', 'price'];

    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
