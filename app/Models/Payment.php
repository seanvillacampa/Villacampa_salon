<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
        protected $table = "payments";

    protected $fillable = [

        'service_id',
        'customer_name',
        'date_schedule',
        'time_schedule',
        'total_amount',
        'payment_status',

    ];

    public function service(){

    return $this->belongsTo(Service::class);

    }
}
