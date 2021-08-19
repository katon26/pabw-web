<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanUser extends Model
{
  protected $table = 'laporan';
  protected $primaryKey = 'id_laporan';
  public $timestamps = true;

}
