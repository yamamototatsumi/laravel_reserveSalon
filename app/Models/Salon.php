<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 
      'salon_id',
      'login_id',
      'password',
      'address',
      'prefectere',
      'city',
      'station',
      'station',
      'header_photo_path',
      'logo_photo_path',
      'catchcopy',
      'information',
      'opened_time',
      'closeed_time',
      'holiday',
      'limit_frame',
      'note',
      'role'
  ];

}
