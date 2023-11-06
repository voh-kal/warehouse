<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributeProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'warehouse_id',
        'floor_number',
       
        'quantity',
'product_id'      
    ];
}
