<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
  public $name;
  public $email;
  public $password;

  protected $rules = [
    'name' => 'required|min:6',
    'email' => 'required|email|unique:users',
    'password' => 'required|string|min:8'
];

public function updated($property){
  $this->validateOnly($property);
}

  public function register(){
    $this->validate();
    User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => Hash::make($this->password)
    ]);

    session()->flash('message', '登録okです');

    return to_route('livewire-test.index');
  }
    public function render()
    {
        return view('livewire.register');
    }
}
