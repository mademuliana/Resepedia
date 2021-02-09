<!--

=========================================================
* Argon Dashboard - v1.1.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Resepedia
  </title>
  <!-- Favicon -->
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
  <link rel="icon" href="{{url('images/demo/resepedia_logo.png')}}">
</head>

<body style="background: linear-gradient(87deg, #ffe31a 0, #ff8312 100%) !important;">
  <div class="main-content">
    <!-- Navbar -->
   
    <!-- Header -->
    <div class="header py-7 py-lg-7" style="background: linear-gradient(87deg,#fc9217 0,#f5501f 100%) !important;">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white" style="font-size:30pt">Resepedia</h1>
              <p class="text-lead text-white" style="font-size:12pt; font-weight: bolder;">Selamat datang di Website Pendataan Restoran Resepedia</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" style="stop-color:#ffe31a ;stop-opacity:1" />
            <stop offset="100%" style="stop-color:#ff8312;stop-opacity:1" />
          </linearGradient>
          <polygon fill="url(#grad1)" points="2560 0 2560 100 0 100"></polygon> 
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" action="/auth">
              {{ csrf_field() }}
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="text-center">
                  <input type="submit" name= "submit" class="btn btn-primary my-4" value="Sign in">
                </div>
              </form>
              @if (session('alert'))
                  <div class="alert alert-danger">
                      {{ session('alert') }}
                  </div>
              @endif
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <footer class="py-5">
    
    </footer>
  </div>
  <!--   Core   -->

  <!--   Optional JS   -->
  <!--   Argon JS   -->
</body>

</html>