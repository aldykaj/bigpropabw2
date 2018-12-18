<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    @yield('css')
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-light navbarheader">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">ZIAGA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active navmenu" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link navmenu" href="{{url('/contents')}}">ARTIKEL</a>
        @if (Route::has('login'))
          @auth
          @if (Auth::user()->hasRole('kontributor'))
          <a class="nav-item nav-link navmenu" href="{{ url('/grafik') }}">GRAFIK</a>
          <a class="nav-item nav-link navmenu" href="{{ url('/contents/create') }}">BUAT ARTIKEL</a>
          @elseif (Auth::user()->hasRole('admin'))
          <a class="nav-item nav-link navmenu" href="{{ url('/grafik') }}">GRAFIK</a>
          <a class="nav-item nav-link navmenu" href="{{ url('/admin') }}">LIHAT PENDAFTAR</a>
          @else
            <a class="nav-item nav-link navmenu" href="{{ url('/daftarkontributor/create') }}">DAFTAR KONTRIBUTOR</a>
          @endif
          @endauth
        @endif
      </div>
    </div>
      <form class="form-inline" action="/contents" method="get">
        <input class="form-control search1" name="search" type="search" aria-label="Search" style="height:30px;"
        placeholder="">
        </input>
      </form>
      @if (Route::has('login'))
          <div class="top-right links">
              @auth
                <ul class="navbar-nav ml-auto">
                  <!--<li class="nav-item">
                    <a class="nav-link navmenu" href="#">Document</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link navmenu" href="#">Notification</a>
                  </li>-->
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle profile navmenu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/profile">Profil</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
                </ul>
              @else
                  <a class="btn btn-outline-light" href="{{ route('login') }}" style="height:30px; padding: 0px 5px; margin-right: 20px;margin-left: 20px;">Login</a>
                  @if (Route::has('register'))
                  <a class="btn btn-outline-light" href="{{ route('register') }}" style="height:30px; padding: 0px 5px;">Sign Up</a>
                  @endif
              @endauth
          </div>
      @endif


  </div>
</nav>

<main>
  @yield('content')
</main>

<footer>
  <div class="container-fluid" style="background-color: #093F49; height:200px;">
    <div class="row" style="padding-top: 50px;">
      <div class="col" style="color:white;">
      </div>
      <div class="col" style="color:white;">
        <h7 style="font-weight:bold;">ZIAGA</h7><br>
        &copy Ziaga 2018
      </div>
      <div class="col" style="color:white;">
        <a href="{{url('/faq')}}" style="color:white;">FAQ</a> <br>
        <a href="{{url('/contents')}}" style="color:white;">Artikel</a> <br>
        <!--<a href="#" style="color:white;">Feedback</a>-->
      </div>
      <div class="col" style="color:white;">
         <img src="{{ asset('png/facebook.png') }}" width="20" height="20">
         <a href="https://www.facebook.com" style="color:white;">Facebook</a> <br>
         <img src="{{ asset('png/twitter.png') }}" width="20" height="20">
         <a href="https://www.twitter.com" style="color:white;">Twitter</a> <br>
         <img src="{{ asset('png/instagram.png') }}" width="20" height="20">
         <a href="https://www.instagram.com/" style="color:white;">Instagram</a>
      </div>
      <div class="col-3" style="color:white;">
        Subscribe to our newsletter <br>
        <form>
          <div class="input-group mb-3">
            <input type="email"
              style="border-radius:2px; color: white; height:30px; background-color:#093F49; border: 1px solid white;"
              placeholder="Email">
            <div class="input-group-append">
              <button
                style="height:30px; padding: 0px 7px; background-color: white; border: 1px solid white; color: #093F49;"
                class="btn btn-outline-secondary" type="button" id="button-addon2">
                  Subscribe
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="col" style="color:white;">
        <address>
          Jl.Sample, Kota Sample, DIY 95673 <br>
          +62 345 678 903 <br>
          ZIAGA@students.uii.ac.id
        </address>
      </div>
      <div class="col" style="color:white;">
      </div>
    </div>
  </div>
</footer>
@yield('script')
</body>
</html>
