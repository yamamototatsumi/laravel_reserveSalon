<?php 

namespace App\Services;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Carbon;

class EventService{

  public static function checkEventDuplication($eventDate,$startTime,$endTime) {
    return Event::whereDate('start_date', $eventDate)
      ->whereTime('end_date','>',$startTime)
      ->whereTime('start_date','<',$endTime)
      ->exists();
  }

  public static function joinDateAndTime($date,$time){
    $join = $date . " " . $time;
    return Carbon::createFromFormat('Y-m-d H:i',$join);
  }


}