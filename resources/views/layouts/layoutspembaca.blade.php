<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
  <title>@yield('title')</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">ZIAGA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">HOME <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#">ARTIKEL</a>
        <a class="nav-item nav-link" href="#">FEED</a>
      </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <form class="form-inline">
            <input class="form-control" type="search" aria-label="Search" style="height:30px;"
            placeholder="">
            </input>
          </form>

            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                  <a class="btn btn-outline-light" href="{{ route('login') }}" style="height:30px; padding: 0px 5px; margin-right: 20px;margin-left: 20px;">Login</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                          <a class="btn btn-outline-light" href="{{ route('register') }}" style="height:30px; padding: 0px 5px;">Sign Up</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            @endguest
        </ul>
    </div>
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
        <a href="#" style="color:white;">FAQ</a> <br>
        <a href="#" style="color:white;">Artikel</a> <br>
        <a href="#" style="color:white;">Feedback</a>
      </div>
      <div class="col" style="color:white;">
         <img src="../png/facebook.png" width="20" height="20">
         <a href="#" style="color:white;">Facebook</a> <br>
         <img src="../png/twitter.png" width="20" height="20">
         <a href="#" style="color:white;">Twitter</a> <br>
         <img src="../png/instagram.png" width="20" height="20">
         <a href="#" style="color:white;">Instagram</a>
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
          17523029@students.uii.ac.id
        </address>
      </div>
      <div class="col" style="color:white;">
      </div>
    </div>
  </div>
</footer>
</body>
</html>
