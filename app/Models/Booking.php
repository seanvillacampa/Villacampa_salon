<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";

    protected $fillable = [

    'service_id',
    'customer_name',
    'contact_number', 
    'date_schedule',
    'time_schedule'

    ];

    public function service(){

    return $this->belongsTo(Service::class);

    }
}
