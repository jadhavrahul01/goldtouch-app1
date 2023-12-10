<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'u_id',
        'cname',
        'cadd',
        'cgstin',
        'cstyle_ref',
        'email',
        'phone',
        'created_at',
        'mtaker1',
        'mtaker2',
        'ponumber',
        'poimg',
        'fabrics_status',
        'status',
        'mtakerDate1',
        'mtakerDate2',
    ];

    protected function uid()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
