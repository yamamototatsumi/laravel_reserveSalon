<html>
  <head>
    @livewireStyles
  </head>
  <body>
    ใในใ
    <div>
      @if (session()->has('message'))
          <div class="">
              {{ session('message') }}
          </div>
      @endif
  </div>
    @livewire('counter')
    @livewireScripts
  </body>

</html>