<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=["title","content","user_id"];
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function category(){
        return $this->belongsTo("App\Category");
    }
    public function tags(){
        return $this->belongsToMany("App\Tag");
    }
    public function getFormattedDate($parameter){
        return $parameter->format("d-m-y H:i:s");
    }
    public function getDifferenceHour($startDate){
        $endDate=Carbon::now();
        $hours=$startDate->diffInHours($endDate);
       if ($hours<=12) {
           return true;
       }
    }
}
