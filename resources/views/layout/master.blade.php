<!DOCTYPE html>
<html>
<head>
  <title>Swipcrm</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  {{--  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">  --}}

  <!-- plugin css -->
<link rel="stylesheet" href="{{asset('assets/fonts/feather-font/css/iconfont.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- end common css -->

  @stack('style')
  <style>
    .pagination li a {
      min-width: 36px;
      display: -webkit-box;
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
}
  </style>
</head>
<body data-base-url="{{url('/')}}" class="">
<script src="{{asset('assets/js/spinner.js')}}"></script>


  <div class="main-wrapper" id="app">
    {{--  @include('admin.layout.sidebar')  --}}
    <div class="page-wrapper">
      @include('layout.header')
      <div class="page-content">
        <div class="row">
          @if(Session::has('success_msg'))
              <div class="alert alert-success  btn-block">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ Session::get('success_msg') }}
              </div>
          @endif
          @if(Session::has('error_msg'))
              <div class="alert alert-danger  btn-block">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ Session::get('error_msg') }}
              </div>
          @endif
          {{-- {{ dd(session()->all()) }} --}}
          @if(count($errors =  $errors->all()))
              @foreach ($errors as $error)
              <div class="alert alert-danger  btn-block">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ $error }}
              </div>
              @endforeach
          @endif
      </div>
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>

    <!-- base js -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('assets/plugins/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>