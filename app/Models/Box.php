<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Product;
use App\Models\RawProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Box extends Model
{
    use HasFactory;

    protected $fillable = ['raw_product_id', 'size_id', 'quantity', 'weight'];

    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
