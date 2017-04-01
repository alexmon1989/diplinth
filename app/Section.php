<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['properties'];
    protected $fillable = ['slug'];
}
