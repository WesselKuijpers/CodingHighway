<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('storage/img/logo/codinghighway.png') }}"/>

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Galdeano" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  <!-- Styles -->
  <link rel="stylesheet" href="{{route('CourseColors')}}">
  <link rel="stylesheet" href="{{route('CalculateColors')}}">
  <link rel="stylesheet" href="{{ asset('css/forum/question.css') }}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @if (Auth::user())
    @if(Auth::user()->organisation())
      <link href="{{ asset('css/organisations/organisation'.Auth::user()->organisation()->id.'.css') }}"
            rel="stylesheet">
    @endif
  @endif
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="{{asset('css/prism.css')}}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script
    src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=gj9mlkj3395o6q4s8tyd5vpjkq1benlr6mcd6ze377vsvqfz"></script>
  <script>
    tinymce.init({
      statusbar: false,
      selector: '.textarea',
      height: 500,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
      image_advtab: true,
      templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
      ],
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ]
    });
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
</head>
<body>
@include('layouts.error')
@include('layouts.msg')
<div id="app">
  <!-- Including navbar partial -->
@include('shared.nav')

<!-- Content container -->
  <main class="py-4 container">
    @yield('content')
  </main>

</div>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://raw.githubusercontent.com/jugglinmike/srcdoc-polyfill/master/srcdoc-polyfill.min.js"></script>
<script type="text/javascript">
  $(".alert").fadeTo(5000, 500).slideUp(500, function () {
    $(".alert").alert('close');
  });
</script>
<script src="{{asset('js/prism.js')}}"></script>
<!-- Including footer partial -->
@include('layouts.footer')
</body>
</html>
