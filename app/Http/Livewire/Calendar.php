<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Services\EventService;
use App\Models\Event;

class Calendar extends Component
{
  public $currentDate;
  public $currentWeek;
  public $day;
  public $checkDay;
  public $dayOfWeek;
  public $sevenDaysLater;
  public $events;

  protected $casts = [
    'events' => 'collection'
];
  
  public function mount(){
    $this->currentDate = CarbonImmutable::today();
    $this->sevenDaysLater = $this->currentDate->addDays(7);
    $this-> currentWeek = [];
    $this->events = Event::whereBetween('start_date', [$this->currentDate->format('Y-m-d'),$this->sevenDaysLater->format('Y-m-d')]) ->orderBy('start_date', 'asc')->get();
    

    for($i = 0; $i < 7; $i++){
      $this->day = CarbonImmutable::today()->addDays($i)->format('m月d日');
      $this->checkDay = CarbonImmutable::today()->addDays($i)->format('y-m-d');
      $this->dayOfWeek = CarbonImmutable::today()->addDays($i)->dayName;
      array_push($this->currentWeek, ['day'=>$this->day,'checkDay'=>$this->checkDay,'dayOfWeek'=>$this->dayOfWeek]);
    }

    // dd($this->currentWeek);
  }

  public function getDate($date){
    $this->currentDate = $date;
    $this-> currentWeek = [];
    $this->sevenDaysLater = CarbonImmutable::parse($this->currentDate)->addDays(7);
    $this->events = Event::whereBetween('start_date', [$this->currentDate,$this->sevenDaysLater->format('Y-m-d')]) ->orderBy('start_date', 'asc')->get();
    for($i = 0; $i < 7; $i++){
      $this->day = CarbonImmutable::parse($this->currentDate)->addDays($i)->format('m月d日');
      $this->checkDay = CarbonImmutable::parse($this->currentDate)->addDays($i)->format('Y-m-d');
      $this->dayOfWeek = CarbonImmutable::parse($this->currentDate)->addDays($i)->dayName;
      array_push($this->currentWeek, ['day'=>$this->day,'checkDay'=>$this->checkDay,'dayOfWeek'=>$this->dayOfWeek]);
      

    }

  }

    public function render()
    {
        return view('livewire.calendar');
    }
}
