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
  public $sevenDaysLater;
  public $events;
  
  public function mount(){
    $this->currentDate = CarbonImmutable::today();
    $this->sevenDaysLater = $this->currentDate->addDays(7);
    $this-> currentWeek = [];
    $this->events = Event::whereBetween('start_date', [$this->currentDate->format('Y-m-d'),$this->sevenDaysLater->format('Y-m-d')]) ->orderBy('start_date', 'asc')->get();
    

    for($i = 0; $i < 7; $i++){
      $this->day = CarbonImmutable::today()->addDays($i)->format('m月d日');
      array_push($this->currentWeek, $this->day);
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
      array_push($this->currentWeek, $this->day);
      

    }
  }

    public function render()
    {
        return view('livewire.calendar');
    }
}
