<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierCompanyName extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'users_id',
    ];
}
