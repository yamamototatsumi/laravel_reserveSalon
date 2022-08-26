<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Carbon;
use App\Services\EventService;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $events = Event::with('users')->find(1)->users()->get()->toArray();
      $today = Carbon::today();
      $events=Event::wheredate('start_date', '>=', $today)
      ->orderby('start_date','asc')
      ->paginate(20);
        return view('manager.events.index',['events' => $events]);
    }



    public function create()
    {
      return view('manager.events.create');
    }


    public function store(StoreEventRequest $request)
    {
      $check = EventService::checkEventDuplication($request->event_date,$request->start_time,$request->end_time);

      if($check){
        session()->flash('status', 'この時間帯は既に予約が存在します');
        return view('manager.events.create');
      }

      $startDate = EventService::joinDateAndTime($request->event_date,$request->start_time);
      $endDate =  EventService::joinDateAndTime($request->event_date,$request->end_time);

      Event::create([
      'name' => $request->event_name, 
      'information' => $request->information, 
      'start_date' => $startDate,
      'end_date' => $endDate,
      'max_people' => $request->max_people, 
      'is_visible' => $request->is_visible,
      ]);

      session()->flash('status', '登録okです');
      return to_route('events.index'); //名前付きルート
    }



    public function show(Event $event)
    {
        $users = Event::with('users')->find($event->id)->users()->get();
        
        $reservations = []; // 連想配列を作成
        foreach($users as $user) {
        $reservedInfo = [
        'name' => $user->name,
        'number_of_people' => $user->pivot->number_of_people, 
        'canceled_date' => $user->pivot->canceled_date
        ];
        array_push($reservations, $reservedInfo); // 連想配列に追加
        }

        $eventDate = $event->eventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;
        return view('manager.events.show', compact('event', 'users','eventDate','startTime','endTime', 'reservations'));
    }


    public function edit(Event $event)
    {
      $event = Event::find($event->id);
      $eventDate = $event->editEventDate;
      $startTime = $event->startTime;
      $endTime = $event->endTime;
      return view('manager.events.edit', compact('event','eventDate','startTime','endTime'));
    }


    public function update(UpdateEventRequest $request, Event $event, EventService $instance)
    {
      $count = EventService::countEventDuplication($request->event_date,$request->start_time,$request->end_time);
      if($count > 1){
        $event = Event::find($event->id);
        $eventDate = $event->editEventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;
        session()->flash('status', 'この時間帯は既に予約が存在します');
        return view('manager.events.edit', compact('event','eventDate','startTime','endTime'));
      }

      $startDate = EventService::joinDateAndTime($request->event_date,$request->start_time);
      $endDate =  EventService::joinDateAndTime($request->event_date,$request->end_time);

      $event = Event::find($event->id)
      ->fill(['name' => $request->event_name, 
      'information' => $request->information, 
      'start_date' => $startDate,
      'end_date' => $endDate,
      'max_people' => $request->max_people, 
      'is_visible' => $request->is_visible,
      ])->save();
      session()->flash('status', '更新されました');
      return to_route('events.index'); //名前付きルート
    }

    public function past(){
      $today = Carbon::today();
      $events = Event::wheredate('start_date', '<', $today)
      ->orderBy('start_date', 'desc')
      ->paginate(20);
      return  view('manager.events.past', compact('events'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
