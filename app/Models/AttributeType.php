<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = "attribute_types";

    protected $fillable = ['name'];

    public const COLOR_ID       = 1;
    public const SIZE_ID        = 2;
    public const MATERIAL_ID    = 3;
    public const BRAND_ID       = 4;
    public const WEIGHT_ID      = 5;

}
