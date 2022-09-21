<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professionel_cateogry extends Model
{
    use HasFactory;
    protected $table = 'professionel_cateogry';
    public $timestamps = false;
    public function favories()
    {
        return $this->hasMany('App\Models\Favoris','proffessionel_id','professionel_id');
    }
    public function person()
    {
        return $this->hasOne('App\Models\proffessionel','id','professionel_id');
    }
}
