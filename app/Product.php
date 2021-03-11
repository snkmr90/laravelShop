<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['product_name','product_description','product_slug','product_stock','product_price'];
}
