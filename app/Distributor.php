<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
	protected $table = 'distributor';
    protected $primarykey = 'id';
    protected $fillable = ['nama','alamat','telepon'];
    public $timestamps = false;

    public function pasok()
    {
      return $this->hasMany('App\Pasok');
    }
}
