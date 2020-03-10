<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'date_and_time' => 'required'
        ]);

        $reserve = Reservation::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_and_time' => $request->date_and_time,
            'message' => $request->message,
            'status' => false
        ]);

        Toastr::success('Reservation request sent successfully. we will confirm to you shortly', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }


}
