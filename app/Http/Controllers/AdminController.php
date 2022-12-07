<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin',[
            'rooms' => Room::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|url',
            'description' => 'required'
        ]);

        $room = new Room();
        $room->name = $request->name;
        $room->image = $request->image;
        $room->description = $request->description;
        $room->save();

        session()->flash('flash.banner', 'Room created');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

    public function edit(int $roomID)
    {
        return Inertia::render('EditRoom',[
            'room' => Room::find($roomID)
        ]);
    }

    public function update(int $roomID, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|url',
            'description' => 'required'
        ]);

        $room = Room::find($roomID);
        $room->name = $request->name;
        $room->image = $request->image;
        $room->description = $request->description;
        $room->save();

        session()->flash('flash.banner', 'Room updated');
        session()->flash('flash.bannerStyle', 'success');

        return redirect('/admin');
    }

    public function deleteRoom(int $id)
    {
        $room = Room::find($id);
        $room->delete();

        session()->flash('flash.banner', 'Room Deleted');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
