<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'assignName1',
        'assignName2',
        'start_date',
        'end_date',
    ];
}
