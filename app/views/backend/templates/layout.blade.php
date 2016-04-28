<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>@yield('title') || Bank Sampah</title>

    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{ asset('styles/img/logo_2.png')}}">
    <link href="{{ asset('styles/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/css/dataTables.css') }}">
    <!-- bootstrap theme -->
    <link href="{{ asset('styles/css/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->

    <link href="{{ asset('styles/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('styles/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{ asset('styles/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{ asset('styles/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('styles/css/owl.carousel.css') }}" type="text/css">

    <!-- Custom styles -->
    <link href="{{ asset('styles/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/css/style-responsive.css') }}" rel="stylesheet" />

    <script type="text/javascript" src="{{ asset('styles/assets/chart-master/Chart.min.js') }}"></script>
    @yield('style_head')
  </head>

  <body>
  <!-- container section start -->
  <section id="container">
      <!--header start-->
      <header class="header white-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <img src="{{ asset('styles/img/logo_1.png' )}}" class="logo" style="height: 50px; margin-top : 5px" alt="" />
            <!--logo end-->
            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                  <li>
                    <a href="{{ action('AdminController@getEditProfile')}}" class="btn btn-warning">Edit Profile</a>
                  </li>
                  <li><a href="{{ action('UserController@getLogout' )}}" class="btn btn-danger">Logout</a></li>
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="@yield('nav1')">
                      <a class="" href="{{ action('AdminController@getDashboard')}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="@yield('nav2')">
                      <a class="" href="{{ action('SampahController@getSampahAll') }}">
                          <i class="icon_genius"></i>
                          <span>Sampah</span>
                      </a>
                  </li>
                  <li class="@yield('nav3')">
                      <a class="" href="{{ action('NasabahController@getNasabahAll') }}">
                          <i class="icon_folder"></i>
                          <span>Nasabah</span>
                      </a>
                  </li>
                  <li class="@yield('nav4')">
                      <a class="" href="{{ action('AdminController@getShowTeller') }}">
                          <i class="icon_book"></i>
                          <span>Manajemen Teller</span>
                      </a>
                  </li>
                  <li class="@yield('nav5')">
                      <a class="" href="{{ action('LaporanController@getShowLaporan') }}">
                          <i class="icon_document_alt"></i>
                          <span>Laporan</span>
                      </a>
                  </li>
                  <li class="@yield('nav6')">
                      <a class="" href="{{ action('BantuanController@getShowBantuan') }}">
                          <i class="icon_info"></i>
                          <span>Bantuan</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading">
                             <h3>@yield('header')</h3>
                    </header>
                    <div class="panel-body">
                    @include('partials.alert')
                    @yield('content')
                    </div>
                </section>
            </div>
            </div>
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->

    <script type="text/javascript" src="{{ asset('styles/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <!-- nice scroll -->
    <script src="{{ asset('styles/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{ asset('styles/assets/jquery-knob/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('styles/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('styles/js/owl.carousel.js') }}" ></script>
    <!-- jQuery full calendar -->
    <script src="{{ asset('styles/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
    <!--script for this page only-->
    <script src="{{ asset('styles/js/calendar-custom.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset('styles/js/jquery.customSelect.min.js') }}" ></script>
    <!--custome script for all page-->
    <script src="{{ asset('styles/js/scripts.js') }}"></script>
    <!-- custom script for this page-->
    <script src="{{ asset('styles/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('styles/js/easy-pie-chart.js') }}"></script>

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
