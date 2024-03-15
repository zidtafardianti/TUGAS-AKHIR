<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>LOGIN</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('pluto-1.0.0') }}/images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="{{ asset('pluto-1.0.0') }}/js/semantic.min.css" />
    <!--[if lt IE 9]>
      
      <![endif]-->
</head>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <section class="vh-100">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                    class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" name="username"class="form-control form-control-lg"
                                            placeholder="username" />
                                            @error('username')
                                        <div class="alert alert-warning">{{$message}}</div>
                                    @enderror
                                        <label class="form-label" for="form3Example3">Username</label>
                                        
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg"
                                            placeholder="password" />
                                            @error('password')
                                            <div class="alert alert-warning">{{$message}}</div>
                                        @enderror
                                        <label class="form-label" for="form3Example4">Password</label>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="#!" class="text-body">Forgot password?</a>
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-lg"
                                          style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                      </div>



                                </form>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('pluto-1.0.0') }}/js/jquery.min.js"></script>
    <script src="{{ asset('pluto-1.0.0') }}/js/popper.min.js"></script>
    <script src="{{ asset('pluto-1.0.0') }}/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="{{ asset('pluto-1.0.0') }}/js/animate.js"></script>
    <!-- select country -->
    <script src="{{ asset('pluto-1.0.0') }}/js/bootstrap-select.js"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('pluto-1.0.0') }}/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('pluto-1.0.0') }}/js/custom.js"></script>
</body>

</html>
