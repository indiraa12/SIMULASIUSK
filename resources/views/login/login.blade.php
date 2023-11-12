<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('argon') }}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('argon') }}/assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('argon') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('argon') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('argon') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 d-flex flex-column mx-lg-5 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Masukan username dan password untuk mengakses akun Anda!</p>
                </div>
                <div class="card-body">
                  <form action="/login" method="POST">
                    @csrf

                    <div class="mb-3">
                      <input type="username" name="username" class="form-control form-control-lg  @error('username')is-invalid @enderror" placeholder="username" aria-label="username" autofocus required>
                    </div>

                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg  @error('password')is-invalid @enderror" placeholder="Password" aria-label="Password" required>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>

        

          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('argon') }}/assets/js/core/popper.min.js"></script>
  <script src="{{ asset('argon') }}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('argon') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('argon') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('argon') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>