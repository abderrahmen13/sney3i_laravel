<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_favorite extends Model
{
    use HasFactory;
    protected $table = 'favoris' ; 
    public function professionel()
    {
        return $this->belongsTo(proffessionel::class);
    }
    

}
