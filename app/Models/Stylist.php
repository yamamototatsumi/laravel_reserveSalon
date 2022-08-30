<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 
      'salon_id',
      'profile_photo_path_1',
      'profile_photo_path_2',
      'rank',
      'experience',
      'catchcopy',
      'information',
      'appeal_technique',
      'favorite_count',
      'is_visiable',
  ];
}
