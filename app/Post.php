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
        $hours=$startDate->diffInHours();
       if ($hours <=12) {
           return true;
       }
    }
    public function actualTime($parameter){
        $endDate=Carbon::now();
        return $endDate->diffForHumans($parameter);
    }
    
}
