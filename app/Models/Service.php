<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [

    'service_name',
    'price',
    'duration',
    'description'
    ];


    public function booking(){

    return $this->hasMany(Booking::class);

    }

    public function payment(){

    return $this->hasMany(Payment::class);

    }
}
