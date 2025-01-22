<?php

namespace App\Http\Controllers;

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
                return view('home.index');
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
}
