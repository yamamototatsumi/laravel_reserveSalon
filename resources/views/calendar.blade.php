
<x-calendar-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          予約可能時間
      </h2>
  </x-slot>

  <div class="py-4">
      <div class="event-calendar border border-red-400 mx-auto sm:px-6 lg:px-8">{{-- app.cssでwidth指定してるだけ --}}
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              @livewire('calendar'){{-- /Applications/XAMPP/htdocs/reserveSalon/resources/views/livewire/calendar.blade.php --}}
          </div>
      </div>
  </div>
</x-calendar-layout>
