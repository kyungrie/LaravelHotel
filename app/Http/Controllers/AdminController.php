<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $usertype = Auth::user()->usertype;
            if ($usertype == 'user') {
                return $this->home();
            }elseif ($usertype == 'admin') {
                return view('admin.index');
            }else {
                return redirect()->back();
            }
        }
    }

    public function home(){
        $room=Room::all();

        return view('home.index',compact('room'));
    }

    public function create_kamar() {
        return view('admin.create_kamar');
    }

    public function tambah_kamar(Request $req) {
        $data = new Room();
        $data -> nama_kamar = $req -> kamar;
        $data -> deskripsi = $req -> desk;
        $data -> harga = $req -> harga;
        $data -> wifi = $req -> wifi;
        $data -> type_kamar = $req -> type;
        $gambar = $req -> gambar;
        if ($gambar) {
            $gambarNama = time(). "." .$gambar -> getClientOriginalExtension();
            $req -> gambar -> move('room',$gambarNama);
            $data -> gambar = $gambarNama;
        }
        $data -> save();

        return redirect() -> back() -> with('success','Kamar Berhasil diTambahkan!');
    }

    public function data_kamar() {

        $data=Room::all();

        return view('admin.data_kamar', compact('data'));
    }

    public function kamar_update($id) {
        $data = Room::find($id);

        return view('admin.update_kamar',compact('data'));
    }

    public function edit_kamar(Request $req,$id) {
        $data = Room::find($id);

        $data -> nama_kamar = $req -> kamar;
        $data -> deskripsi = $req -> desk;
        $data -> harga = $req -> harga;
        $data -> wifi = $req -> wifi;
        $data -> type_kamar = $req -> type;
        $gambar = $req -> gambar;
        if ($gambar) {
            $gambarNama = time(). "." .$gambar -> getClientOriginalExtension();
            $req -> gambar -> move('room',$gambarNama);
            $data -> gambar = $gambarNama;
        }
        $data -> save();

        return redirect('/data_kamar')->with('success','Kamar Berhasil diUpdate!');
    }

    public function kamar_delete($id) {
        $data = Room::find($id);
        $data->delete();

        return redirect()->back()->with('success','Kamar Berhasil diHapus!');
    }

    public function booked_kamar(){
        $data = Booking::all();

        return view('admin.booked_kamar', compact('data'));
    }

    public function booking_update($id) {
        $data = Booking::find($id);

        return view('admin.update_booking',compact('data'));
    }

    public function edit_booking(Request $req, $id) {

        $req-> validate([
            'startDate'=> 'required|date',
            'endDate'=> 'required|after:startDate',
        ],[
            'startDate.required' => 'Tanggal mulai harus di isi!',
            'startDate.date' => 'Tanggal mulai harus berupa tanggal yang valid!',
            'endDate.date' => 'Tanggal akhir harus berupa tanggal yang valid!',
            'endDate.after' => 'Tanggal akhir harus setelah tanggal mulai!',
        ]);
        $data = Booking::find($id);
        $data->room_id = $req->room_id;
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
            $data->end_date = $req->endDate;
            $data->save();
            return redirect()->back()->with('message','Data sudah diUpdate!');
        }

    }
    public function booking_delete($id) {
        $data = Booking::find($id);
        $data->delete();

        return redirect()->back()->with('success','Kamar Berhasil diHapus!');
    }
}
