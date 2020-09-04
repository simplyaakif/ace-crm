<!doctype html>
<html lang="en')}}">

<head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @yield('head')

      @include('layout.css')
</head>

<body>

      @include('layout.nav')
      <div id="" class="br-mainpanel" style="position: relative;">

            @yield('page')

            @include('layout.foot')

      </div>


      <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
      <script src="{{ asset('lib/popper.js/popper.js') }}"></script>
      <script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
      <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
      <script src="{{ asset('lib/moment/moment.js') }}"></script>
      <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
      <script src="{{ asset('lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
      <script src="{{ asset('lib/peity/jquery.peity.js') }}"></script>
      {{-- <script src="{{ asset('lib/chartist/chartist.js') }}"></script> --}}
{{--      <script src="{{ asset('lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>--}}
      {{--<script src="{{ asset('lib/d3/d3.js') }}"></script>--}}
      {{-- <script src="{{ asset('lib/rickshaw/rickshaw.min.js') }}"></script> --}}


      <script src="{{asset('js/bracket.js')}}"></script>
      <script src="{{asset('js/ResizeSensor.js')}}"></script>
      {{-- <script src="{{asset('js/dashboard.js')}}"></script> --}}
      <script>
            $(function(){
          'use strict'
  
          // FOR DEMO ONLY
          // menu collapsed by default during first page load or refresh with screen
          // having a size between 992px and 1299px. This is intended on this page only
          // for better viewing of widgets demo.
          $(window).resize(function(){
            minimizeMenu();
          });
  
          minimizeMenu();
  
          function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
              // show only the icons and hide left menu label by default
              $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
              $('body').addClass('collapsed-menu');
              $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
              $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
              $('body').removeClass('collapsed-menu');
              $('.show-sub + .br-menu-sub').slideDown();
            }
          }
        });
      </script>

      {{--@if(config('app.env') == 'local')--}}
      {{--<script src="http://127.0.0.1:8000//livereload.js"></script>--}}
      {{--@endif--}}

      @yield('bottom')

</body>

</html>