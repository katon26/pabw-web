<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
// use App\Admin;
use App\Http\Requests;
use App\User;
use App\Laporan;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;

use Validator;
use Redirect;
use View;

class AdminController extends Controller
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
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $laporan = Laporan::select('laporan.*')->orderBy('created_at' , 'DESC')->get();
    $d = 0;
    foreach($laporan as $value){
      if($value->is_read_admin == 0){
        $d += 1;
      }
    }
    return view('/admin', compact('d'));
  }

  public function daftarlaporan()
  {
    $laporan = Laporan::select('laporan.*')->orderBy('created_at' , 'DESC')->get();
    $d = 0;
    foreach($laporan as $value){
      if($value->is_read_admin == 0){
        $d += 1;
      }
    }
    return view('/daftar-laporan', compact('laporan', 'd'));
  }

  public function kelola()
  {
      $laporan = Laporan::select('laporan.*')->orderBy('created_at' , 'DESC')->get();

      $laporann = Laporan::select('laporan.*')->get();

      $d = 0;
      foreach($laporann as $value){
        if($value->is_read_admin == 0){
          $d += 1;
        }
      }

      return view('/kelola-laporan', compact('laporan', 'd'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Laporan $laporan)
  {
    // dd($laporan);
      if($laporan->status == "Sedang diproses"){
        Laporan::where('id_laporan' , $laporan->id_laporan)
        ->update([
          'status' => 'Terverifikasi',
          'is_read_admin' => 1,
          'is_read_pelapor' => 0,
        ]);
      }elseif($laporan->status == "Terverifikasi"){
        Laporan::where('id_laporan' , $laporan->id_laporan)
        ->update([
          'status' => 'Selesai',
          'is_read_admin' => 1,
          'is_read_pelapor' => 0,
        ]);
      }
  return redirect()->back();
}


  public function notif()
  {
    $laporann = Laporan::all();

    $d = 0;
    foreach($laporann as $value){
      if($value->is_read_admin == 0){
        Laporan::where('id_laporan', $value->id_laporan)
        ->update([
          "is_read_admin" => 1,
        ]);
      }
    }
    return redirect('/kelola-laporan');

  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
