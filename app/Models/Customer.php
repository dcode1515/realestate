<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'id',
		'property_id',
        'customer_name',
        'customer_address',
        'customer_no',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
     
       
	];
    public function property(){
        return $this->belongsTo('App\Models\Property','property_id','id');
    }
}
