<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_description_ar' ,
        'product_description_en' ,
        'product_name_ar' ,
        'product_name_en',
        'price' ,
        'description' ,
        'product_image'
    ];
    protected $table = 'products';

}
