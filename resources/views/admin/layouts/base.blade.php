<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <title>Persediaan Barang | @yield('title')</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{asset('pluto-1.0.0')}}/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('pluto-1.0.0')}}/css/custom.css" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

      <!-- PWA  -->
      <meta name="theme-color" content="#6777ef"/>
      <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
      <link rel="manifest" href="{{ asset('/manifest.json') }}">
            
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
        <div class="full_container">
            <div class="inner_container">
                <!-- Sidebar  -->
                @include('admin.layouts.sidebar')
                <!--sidebar-->

                <!--content-->
                <div id="content">
                    
                <!--navbar-->
                @include('admin.layouts.navbar')
               
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <section class="content">
                    </section>
                    <div class="container-fluid">
                        @yield('content')

                     <!--untuk kata dashboard-->
                        
                        <!--untuk kata dashboard-->

                        

                        <!-- grafik -->
                        
                        <!-- grafik -->

                       
                        <!--footer-->
                        
                        <!--footer-->
                    </div>
                    @include('admin.layouts.footer')
                </div>
            </div>
            <!--content-->  
             
        </div>   
        @include('sweetalert::alert')
 
                        

<!-- jQuery -->
<script src="{{asset('pluto-1.0.0')}}/js/jquery.min.js"></script>
      <script src="{{asset('pluto-1.0.0')}}/js/popper.min.js"></script>
      <script src="{{asset('pluto-1.0.0')}}/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="{{asset('pluto-1.0.0')}}/js/animate.js"></script>
      <!-- select country -->
      <script src="{{asset('pluto-1.0.0')}}/js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="{{asset('pluto-1.0.0')}}/js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="{{asset('pluto-1.0.0')}}/js/Chart.min.js"></script>
      <script src="{{asset('pluto-1.0.0')}}/js/Chart.bundle.min.js"></script>
      <script src="{{asset('pluto-1.0.0')}}/js/utils.js"></script>
      <script src="{{asset('pluto-1.0.0')}}/js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('pluto-1.0.0')}}/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('pluto-1.0.0')}}/js/custom.js"></script>
      <script src="{{asset('pluto-1.0.0')}}/js/chart_custom_style1.js"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

      <script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>

      <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      @yield('js')

      <style>
         .circle-container {
            width: 70px;
            height: 70px;
            overflow: hidden;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px; /* Sesuaikan margin sesuai kebutuhan */
            background-color: #fff; /* Atur warna latar belakang sesuai kebutuhan */
         }

         .circle-container img {
            width: 100%;
            height: auto;
         }
         
      </style>
   </body>
</html>