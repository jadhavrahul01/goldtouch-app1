<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'userId',
        'email',
        'description',
        'status',
        'due_date',
    ];

    protected function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
