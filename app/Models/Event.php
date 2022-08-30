<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
      'salon_id',
      'stylist_id',
      'user_id',
      'start_date', 
      'end_date', 
      'information',
      'memo',
      'price',
      'checked_at',
      'canceled_at',
      'max_people',
      'name', 
      'is_visible'
  ];
  protected $dates = [
    'start_date'
];

  public function users()
  {
    return $this->belongsToMany(User::class)
    ->withPivot('id', 'number_of_people', 'canceled_date');
  }


  protected function eventDate() :Attribute{
    return new Attribute(
      get: fn () => Carbon::parse($this->start_date)->format('Y年m月d日'),);
  }

  protected function startTime(): Attribute { 
    return new Attribute(
    get: fn () => Carbon::parse($this->start_date)->format('H時i分'), ); 
  }


    protected function endTime(): Attribute { 
      return new Attribute(
    get: fn () => Carbon::parse($this->end_date)->format('H時i分'),);
  }

  protected function editEventDate() :Attribute{
    return new Attribute(
      get: fn () => Carbon::parse($this->start_date)->format('Y-m-d'),);
  }
    
}


