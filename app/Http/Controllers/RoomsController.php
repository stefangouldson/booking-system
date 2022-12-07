<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    public function index()
    {
        return Inertia::render('Rooms',[
            'rooms' => Room::all()
        ]);
    }

    public function book(int $roomID, Request $request)
    {
        $booking = new Booking();
        $booking->dateTime = $request->booking;
        $booking->room_id = $roomID;
        $booking->user_id = Auth::user()->id;
        $booking->save();

        session()->flash('flash.banner', 'Booking created');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
