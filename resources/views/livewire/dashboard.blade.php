<div>
  <div class="text-center text-sm">
    日付を選択してください。本日から最大30日先まで選択可能です。
  </div>
  <x-jet-input id="calendar" class="block mt-1 mb-2 mx-auto" type="text" name="calendar"
    value="{{ $currentDate }}"  wire:change="getDate($event.target.value)"/>

    <div class="flex border border-green-400 mx-auto">
      @for($i = 0; $i < 7; $i++)
      <div class="w-32">
      <div class="py-1 px-2 border border-gray-200 text-center"> {{ $currentWeek[$i]['day'] }}</div> 
      <div class="py-1 px-2 border border-gray-200 text-center"> {{ $currentWeek[$i]['dayOfWeek'] }}</div> 
      
      </div>
      @endfor
    </div>    
    @foreach($events as $event)
              {{$event->total_count}}
              @endforeach

    


  {{-- @foreach ($events as $event)
  {{$event->start_date}}<br>
  @endforeach --}}
</div>
