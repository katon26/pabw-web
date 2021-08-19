<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapor;

class LaporController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      return view('lapor');
  }

  function save(Request $req){
      $aksi = new Lapor;
      $aksi->pelapor= $req->pelapor;
      $aksi->kategori= $req->kategori;
      $aksi->deskripsi= $req->deskripsi;
      $aksi->lokasi= $req->lokasi;
      $aksi->status= $req->status;

      if ($req->hasfile('gambar')) {
          $file = $req->file('gambar');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '.' . $extension;
          $file->move('/bukti_laporan', $filename);
          $aksi->gambar = $filename;
      } else {
          return $req;
          $aksi->gambar = '';
      }
      echo $aksi->save();

    }

}
