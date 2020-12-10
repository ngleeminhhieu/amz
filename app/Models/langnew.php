<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class langnew extends Model
{
    use HasFactory;
    public function news()
    {
        return $this->hasOne('\App\Models\news', 'id', 'idNews');
    }
}