<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHeight extends Model
{
    public $table = 'products_heights';

    public $fillable = ['value', 'price', 'available'];
}
