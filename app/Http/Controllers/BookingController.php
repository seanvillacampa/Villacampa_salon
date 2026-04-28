<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;

class BookingController extends Controller
{
    
    public function index(){

    $bookings = Booking::all();
    $services = Service::all();
    return view("bookings.index", ["books" => $bookings, "servs" => $services]);

    }

    public function store(Request $request){

    Booking::create([

    "service_id"=>$request->service_id,
    "customer_name" => $request -> b_customer_name,
    "contact_number"  => $request->b_contact_number,
    "date_schedule"=>$request->b_date_schedule,
    "time_schedule"=>$request->b_time_schedule

    


    ]);

    return redirect("/bookings");

    }

    public function edit($id){

    $booking = Booking::findOrFail($id);
    $service = Service::all();

    return view("bookings.edit", ["book" => $booking, "serv" => $service]);

    }

    public function update(Request $request, $id){

    $booking = Booking::findOrFail($id);

    $booking ->update([

    "service_id"=>$request->service_id,
    "customer_name" => $request -> b_customer_name,
    "contact_number"  => $request->b_contact_number,
    "date_schedule"=>$request->b_date_schedule,
    "time_schedule"=>$request->b_time_schedule,


    ]);

    return redirect("/bookings");

    }

    public function delete($id){

    $booking = Booking::findOrFail($id);

    $booking ->delete();

    return redirect("/bookings");
    }

}
