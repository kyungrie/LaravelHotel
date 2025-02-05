<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_detail($id){
        $room = Room::find($id);
        return view('home.room_detail', compact('room'));
    }
}
