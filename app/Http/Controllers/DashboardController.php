<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapor;
use App\Laporan;
use App\Dashboard;

use App\Http\Requests;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;

use Validator;
use Redirect;
use View;


class DashboardController extends Controller
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
        $laporan = Laporan::select('laporan.*')->orderBy('created_at' , 'DESC')->limit(2)->get();
        // return view('dashboard' , compact('laporan'));
        return view('dashboard')->withLaporan($laporan);
    }

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id_laporan = $request->id_laporan;
        $laporan = Laporan::where('id_laporan','<',$id_laporan)->orderBy('created_at' , 'DESC')->limit(2)->get();

        if(!$laporan->isEmpty())
        {
          foreach($laporan as $datalapor)
          {
            $id_laporan = $datalapor->id_laporan;
            $created_at=$datalapor->created_at;
            $deskripsi = $datalapor->deskripsi;
            $pelapor = $datalapor->pelapor;
            $gambar = $datalapor->gambar;

            $output .= '<div class="post row m-b-25">
                              <div class="col-auto p-r-0">
                                  <div class="u-img"> <img src="assets/img/default-avatar.png" alt="user image" class="img-radius cover-img"></div>
                              </div>
                              <div class="col wrap-input100 input100-select bg1">
                                  <h6 class="m-b-5">'.$datalapor->pelapor.'</h6>
                                  <p class="m-b-5">#'.$datalapor->id_laporan.'<span><i class="fa fa-circle m-r-10" aria-hidden="true"></i>'.$datalapor->status.'</span></p>
                                  <p class="m-b-0">'.$datalapor->deskripsi.'</p>
                                  <p class="m-b-5">Lokasi : '.$datalapor->lokasi.'</p>
                                  <div class="col-auto p-r-0">';

            if($datalapor->gambar)
            {
              $output .= '<div class="u-img"> <img class="myImages img-radius cover-img" id="myImg" src="/bukti_laporan/'.$datalapor->gambar.'" alt="user image" width="300" height="200"></div>';
            }else{
              $output .= '<p class="">Tidak ada lampiran.</p>';
            }

            $output .=                '<div id="myModal" class="modal">
                                  		<span class="close">&times;</span>
                                  		<img class="modal-content" id="img01">
                                  		<div id="caption"></div>
                                      </div>
                                  </div>
                                  <p class="date text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>'.$datalapor->created_at.'</p>
                              </div>
                          </div>';
          }

          $output .= '<div id="remove-row" class="text-center">
                          <button id="btn-more" data-id="'.$datalapor->id_laporan.'" class="btn btn-danger" > Load More </button>
                      </div>';

          echo $output;
      }
    }

    function save(Request $req){
        $aksi = new Lapor;
        $aksi->pelapor= $req->pelapor;
        $aksi->kategori= $req->kategori;
        $aksi->deskripsi= $req->deskripsi;
        $aksi->lokasi= $req->lokasi;
        $aksi->status= $req->status;
        $aksi->is_read_admin= 0;
        $aksi->is_read_pelapor= 1;
        $aksi->id_user= Auth::id();

        if ($req->hasfile('gambar')) {
            $file = $req->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('bukti_laporan'), $filename);
            $aksi->gambar = $filename;
        } else {
            // return $req;
            $aksi->gambar = '';
        }
        $aksi->save();

        return redirect('/dashboard')->with('pesan','Data berhasil dikirim');

    }
}
