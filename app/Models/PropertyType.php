<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyType extends Model
{
    use HasFactory;
    protected $table = 'property_type';
    protected $fillable = [
        'id',
		'property_type_name',
        'created_at',
        'updated_at',
       
	];
}
