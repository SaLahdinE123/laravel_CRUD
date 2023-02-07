<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['productName' , 'price' , 'description'];
    protected $table = 'products';
}
