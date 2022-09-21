<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $appends = ['ratings'];
    public function getRatingsAttribute(){
        return $this->avg('rating');
    }
  
    protected $fillable=["user_id","rating",'proffessionnel_id'];
    protected $table="ratings";
 
}
