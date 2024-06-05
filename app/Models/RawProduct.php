<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RawProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'prefix'];

    public function sizes()
    {
        return $this->hasMany(Size::class);
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
