<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class proffessionel extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'professionnels';
    protected $fillable=["uid","first_name",
    "last_name",
    "email",
    "cin",
    "image",
    "adress",
    "password",
    "picture",
    "birthday",
    "phone"];
    public function rating()
    {
        return $this->hasMany('App\Models\Rating','proffessionnel_id','id');
    }
}
