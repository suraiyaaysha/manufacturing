<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Size;
use App\Models\RawProduct;
use Illuminate\Database\Eloquent\Model;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'raw_product_id', 'size_id', 'box_id', 'stock'];

    public function rawProduct()
    {
        return $this->belongsTo(RawProduct::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function generateBarcode()
    {
        $generator = new BarcodeGeneratorPNG();
        
        $uniqueIdentifier = $this->name . '-' . $this->id;
        
        // Generate barcode based on the unique identifier
        $barcode = $generator->getBarcode($uniqueIdentifier, $generator::TYPE_CODE_128);
        
        return 'data:image/png;base64,' . base64_encode($barcode);
    }
    
    
}
