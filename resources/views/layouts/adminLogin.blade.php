<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/rickshaw/rickshaw.min.css" rel="styleshee') }}t">

     <!-- chart -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">
  </head>

  @yield('content')


  <script src="{{ asset('backend/jquery/jquery.js') }}"></script>
  <script src="{{ asset('backend/popper.js/popper.js') }}"></script>
  <script src="{{ asset('backend/bootstrap/bootstrap.js') }}"></script>
  <script src="{{ asset('backend/jquery-ui/jquery-ui.js') }}"></script>
  <script src="{{ asset('backend/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
  <script src="{{ asset('backend/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('backend/d3/d3.js') }}"></script>
  <script src="{{ asset('backend/rickshaw/rickshaw.min.js') }}"></script>
  <script src="{{ asset('backend/chart.js/Chart.js') }}"></script>
  <script src="{{ asset('backend/Flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('backend/Flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('backend/Flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('backend/flot-spline/jquery.flot.spline.js') }}"></script>

  <script src="{{ asset('backend/js/starlight.js') }}"></script>
  <script src="{{ asset('backend/js/ResizeSensor.js') }}"></script>
  <script src="{{ asset('backend/js/dashboard.js') }}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

  <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
               toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
   </script>  


<script>  
       $(document).on("click", "#return", function(e){
           e.preventDefault();
           var link = $(this).attr("href");
              swal({
                title: "Are you Want to Return?",
                text: "Once Teturn, this will return your money!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                     window.location.href = link;
                } else {
                  swal("Cancel!");
                }
              });
          });
  </script>

</body>
</html>