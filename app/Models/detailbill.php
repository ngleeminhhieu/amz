<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailbill extends Model
{
    use HasFactory;
    public function bill()
    {
        return $this->hasOne('\App\Models\bill', 'id', 'billID');
    }
    public function product()
    {
        return $this->hasOne('\App\Models\product', 'id', 'productID');
    }
}