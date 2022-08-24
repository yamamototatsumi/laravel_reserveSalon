<div style="text-align: center">
  <button wire:click="increment">+</button>
  <h1>{{ $count }}</h1>
  <div class="mb-8"></div>
  
  こんにちは、{{ $name }}さん<br>
  <input type="text" wire:model="name"><br>
  {{--<input type="text" wire:model.debounce.2000ms="name"><br>
  <input type="text" wire:model.defer.2000ms="name"><br> --}}
  {{-- <input type="text" wire:model.lazy.2000ms="name"><br> --}}
  <br>
  <button wire:mouseover="mouseOver">マウスを合わせて</button>
</div>