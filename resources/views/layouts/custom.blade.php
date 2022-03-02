
<!DOCTYPE html>
<html>
  @include('partials.header')
  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      @include('partials.sidebar')
      <div class="relative md:ml-64 bg-blueGray-50">
        @include('partials.navbar')
        <!-- Header -->
        {{$slot}}
        {{-- @include('partials.footer') --}}
      </div>
    </div>
    @include('partials.scripts')
  </body>
</html>
