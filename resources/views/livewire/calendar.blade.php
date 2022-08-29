<div>
  <div class="text-center text-sm">
    日付を選択してください。本日から最大30日先まで選択可能です。
  </div>
  <x-jet-input id="calendar" class="block mt-1 mb-2 mx-auto" type="text" name="calendar"
    value="{{ $currentDate }}"  wire:change="getDate($event.target.value)"/>

    <div class="flex border border-green-400 mx-auto">
      <x-calendar-time />
      @for($i = 0; $i < 7; $i++)
      <div class="w-32">
      <div class="py-1 px-2 border border-gray-200 text-center"> {{ $currentWeek[$i]['day'] }}</div> 
      <div class="py-1 px-2 border border-gray-200 text-center"> {{ $currentWeek[$i]['dayOfWeek'] }}</div> 
        @for($j = 0; $j < 21; $j++)
        
          @if($events->isNotEmpty()){{-- 1 --}}{{-- 成立してる --}}
          @if(!is_null($events->firstWhere('start_date', $currentWeek[$i] ['checkDay'] . " " . \Constant::EVENT_TIME[$j]) )){{-- 2 --}}
          @php
            $eventId = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . " " . \Constant::EVENT_TIME[$j])->id;
            $eventName = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . " " . \Constant::EVENT_TIME[$j])->name;   //イベントの名前取得
            $eventInfo = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . " " . \Constant::EVENT_TIME[$j]); //いベントの開始時間
            $eventPeriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30 - 1; //30分につき1の差分を取得
          @endphp
          <a href="{{route('event.detail', ['id' => $eventId])}}">
          <div class="py-1 px-2 h-8 border border-gray-200 text-xs bg-blue-100">
            {{ $eventName }}
            </div>
          </a>
            @if($eventPeriod > 0 )
              @for($k = 0 ; $k < $eventPeriod; $k ++)
              <div class="py-1 px-2 h-8 border border-gray-200 bg-blue-100"></div>
              @endfor
              @php
              $j += $eventPeriod;
              @endphp
              @endif
            @else{{-- 2 --}}
              <div class="py-1 px-2 h-8 border border-gray-200"></div>
            @endif{{-- 2 --}}

            @else{{-- 1 --}}
            <div class="py-1 px-2 h-8 border border-gray-200"></div>
          @endif{{-- 1 --}}
        @endfor
      </div>
      @endfor
    </div>


  {{-- @foreach ($events as $event)
  {{$event->start_date}}<br>
  @endforeach --}}
</div>
