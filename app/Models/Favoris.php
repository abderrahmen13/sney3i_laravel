<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    use HasFactory;
    protected $fillable=["client_id","proffessionel_id"];
    protected $table="favoris";
    public function person()
    {
        return $this->hasOne('App\Models\proffessionel','id','proffessionel_id');
    }
}
