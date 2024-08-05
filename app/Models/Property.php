<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property';
    protected $fillable = [
        'id',
		'property_name',
        'property_address',
        'square_meter',
        'bedrooms',
        'toilet',
        'price',
        'status',
        'image',
        'type',
        'quality',
        'monthly_rate',
        'property_type_id',
        'image1',
        'image2',
        'image3',
        'image4',
        'created_at',
        'updated_at',
        'deleted_at',
       
	];
    public static function generatePropertyNo($prefix)
    {
        $now = Carbon::now();
        $dateToday = $now->format('Y');
        $formattedId = str_pad(self::count() + 1, 5, '0', STR_PAD_LEFT);
    
        return $prefix . '-' . $dateToday .$formattedId;
    }
    public function property_type(){
        return $this->belongsTo('App\Models\PropertyType','property_type_id','id');
    }
}
