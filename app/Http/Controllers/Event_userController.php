<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event_user;

class Event_userController extends Controller
{
    // public function dashboard(){
    //   return view('dashboard');
    // }

    public function detail($id){
      $event = Event::find($id);
      return view('event-detail',compact('event'));
    }

    public function reserve(Request $request){
      Event::find($request->id);
      
    }
}
