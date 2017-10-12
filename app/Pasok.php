<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasok extends Model
{
    protected $table = 'pasok';
    protected $primarykey = 'id';
    protected $fillable = ['distributor_id','buku_id','jumlah','tanggal'];

    public function buku()
    {
      return $this->belongsTo('App\Buku');
    }

    public function distributor()
    {
      return $this->belongsTo('App\Distributor');
    }

}
