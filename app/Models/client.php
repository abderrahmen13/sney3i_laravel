<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class client extends Model
{
    use HasFactory , SoftDeletes;
    protected $table="clients";
    protected $fillable=[
        "uid",
        "first_name",
        "last_name",
        "email",
        "cin",
        "image",
        "adress",
        "password",
        "picture",
        "birthday",
        "phone"
    ];
}
