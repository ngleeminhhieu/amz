<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as abc;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements abc
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['product_name', 'product_describe', 'product_detail'];
    //protected $fillable = ['author'];

    public function category()
    {
        return $this->hasOne('\App\Models\category', 'id', 'categoryID');
    }

    public function brand()
    {
        return $this->hasOne('\App\Models\brand', 'id', 'brandID');
    }

    public function supplier()
    {
        return $this->hasOne('\App\Models\supplier', 'id', 'supplierID');
    }

    public function getPriceOffcialAttribute()
    {
        return $this->price - $this->sale;
    }
}