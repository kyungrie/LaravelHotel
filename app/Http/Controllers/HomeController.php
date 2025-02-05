<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_detail($id){
        $room = Room::find($id);
        return view('home.room_detail', compact('room'));
    }

    public function add_booking(Request $req, $id) {

        $req-> validate([
            'startDate'=> 'required|date',
            'endDate'=> 'required|after:startDate',
        ],[
            'startDate.required' => 'Tanggal mulai harus di isi!',
            'startDate.date' => 'Tanggal mulai harus berupa tanggal yang valid!',
            'endDate.date' => 'Tanggal akhir harus berupa tanggal yang valid!',
            'endDate.after' => 'Tanggal akhir harus setelah tanggal mulai!',
        ]);
        $data = new Booking();
        $data->room_id = $id;
        $data->nama = $req->nama;
        $data->email = $req->email;
        $data->telepon = $req->telepon;

        $startDate = $req->startDate;
        $endtDate = $req->endDate;
        $isBooked = Booking::where('room_id',$id)->where('start_date', '<=', $endtDate)->where('end_date', '>=', $startDate)->exists();
        if ($isBooked) {

            return redirect()->back()->with('message','Kamar sudah dibooking pada tanggal tersebut!');
        }else {

            $data->start_date = $req->startDate;
            $data->end_date = $req->end_Date;
            $data->save();
            return redirect()->back()->with('message','Kamar Berhasil di Pesan');
        }

    }
}
