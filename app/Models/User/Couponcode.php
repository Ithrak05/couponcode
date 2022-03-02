<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couponcode extends Model
{
    use HasFactory;

    protected $table = 'user_couponcodes';
    protected $fillable = [
        'user_id','name','offer','offer_usage','offer_used','offer_used_details','offer_expiry_date','status'
    ];
}
