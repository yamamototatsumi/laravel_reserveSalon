<?php 

namespace App\Services;


use Carbon\Carbon;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;

class EventService{

  public static function checkEventDuplication($eventDate,$startTime,$endTime) {
    return Event::whereDate('start_date', $eventDate)
      ->whereTime('end_date','>',$startTime)
      ->whereTime('start_date','<',$endTime)
      ->exists();
  }

  public static function countEventDuplication($eventDate,$startTime,$endTime) {
    return Event::whereDate('start_date', $eventDate)
      ->whereTime('end_date','>',$startTime)
      ->whereTime('start_date','<',$endTime)
      ->count();
  }

  public static function joinDateAndTime($date,$time){
    $join = $date . " " . $time;
    return Carbon::createFromFormat('Y-m-d H:i',$join);
  }

  public static function getWeekEvents($startDate, $endDate){
    $today = Carbon::today();
    return Event::whereBetween('start_date', [$startDate, $endDate]) ->orderBy('start_date', 'asc')
    ->get();
  }

}