<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    public function detailbill()
    {
        return $this->hasMany('\App\Models\detailbill', 'billID', 'id');
    }
}