<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class taikhoan extends Authenticatable
{
    use HasFactory;
    protected $table = 'quantritaikhoan';
    public function username()
    {
        return 'username';
    }
}
