<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'id',
		'property_id',
        'customer_id',
        'amount',
        'status',
        'days',
        'created_at',
        'updated_at',
       
     
       
	];

}
