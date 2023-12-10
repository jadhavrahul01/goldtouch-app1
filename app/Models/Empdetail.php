<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sname',
        'tokenNo',
        'customer_id',
        'fullName',
        'category',
        'setOrder',
        'status',
    ];
}
