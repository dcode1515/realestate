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
    public function property(){
        return $this->belongsTo('App\Models\Property','property_id','id');
    }
    public function customer(){
        return $this->belongsTo('App\Models\Property','customer_id','id');
    }

}
