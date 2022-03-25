<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'quantity',
        'tb_price',
        'bp_per_qty',
        'sp_per_qty',
        'date_purchased',
        'manufactured_date',
        'expire_date',
        'medical_stores_id',
        'supplier_id',
    ];
}
