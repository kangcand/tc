<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;

    protected $fillable = ['id_rw','reaktif','positif','sembuh','meninggal','tanggal'];
    public $timestamps = true;

    public function rw()
    {
        return $this->belongsTo('App\Models\Rw','id_rw');
    }
}
