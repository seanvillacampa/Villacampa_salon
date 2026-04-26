<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('service')->latest()->get();
        return view('payments.index', compact('bookings'));
    }


    public function markAsPaid(Booking $booking)
    {
        DB::transaction(function () use ($booking) {
            Payment::create([
                'service_id'     => $booking->service_id,
                'customer_name'  => $booking->customer_name,
                'date_schedule'  => $booking->date_schedule,
                'time_schedule'  => $booking->time_schedule,
                'total_amount'   => $booking->service->price,
                'payment_status' => 'paid',
            ]);

            $booking->delete();
        });

        return redirect("/payments");
    }


    public function history()
    {
        $payments = Payment::with('service')->latest()->get();

        return view('paymenthistory.index', compact('payments'));
    }
}