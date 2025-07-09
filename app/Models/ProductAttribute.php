<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = "product_attributes";
    
    protected $fillable = ['product_id', 'name', 'value', 'attribute_type_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeType()
    {
        return $this->belongsTo(AttributeType::class);
    }
}
