<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $table = 'newss';
    public function langnew()
    {
        return $this->hasMany('\App\Models\langnew', 'idNews', 'id');
    }

    public static function one($id)
    {
        return self::where('id', $id)->first()->langnew->where('lang', \App::getLocale())->first;
    }
}