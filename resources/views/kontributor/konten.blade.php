@extends('layouts')

@section('css')
<style media="screen">

</style>
@endsection

@section('content')
<div class="container shadow p-3 mb5 bg-white" style="margin-top:50px; margin-bottom: 100px; border: 0.5px solid #dddddd;">
  <div class="row navbar navbar-expand-lg navbar-light" style="background-color:none !important; margin-top: -10px !important;margin-bottom: 20px;">
      <div class="judul">
        <h2>SEMUA KONTEN</h2>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin-bottom:7px;">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Filter Berdasarkan Kategori
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/contents">Semua</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Banjir">Banjir</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Tanah Longsor">Tanah Longsor</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Kebakaran Hutan">Kebakaran Hutan</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Gempa Bumi">Gempa Bumi</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Tsunami">Tsunami</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Kekeringan">Kekeringan</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Gunung Meletus">Gunung Meletus</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Pemanasan Global">Pemanasan Global</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Angin Topan">Angin Topan</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Badai">Badai</a>
              <a class="dropdown-item" href="/contents/filter/kategori/Lain-lain">Lain-Lain</a>
            </div>
          </div>
        </ul>
      	<div class="nav-item dropdown" style="margin-bottom:7px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/contents/filter/Terbaru">Konten Terbaru</a>
          </div>
        </div>
      </div>
  </div>

  <div class="row" align="center">
    @foreach ($konten as $i => $content)
    <div class="col">
      <div class="card" style="width: 18rem; margin-bottom:50px; text-align:left;">
        <a href="/contents/{{$content->slug}}" class="deskirpsi-card" style="color: #196D7C;">
          <img class="card-img-top" src="{{ asset('storage/gambar/'.$content->gambar) }}" alt="tidak ada gambar">
          <div class="card-body">
            <div style="height:45px; overflow: hidden; margin-bottom:20px;">
              <h5 class="card-title">{{$content->judul}}</h5>
            </div>
            <div  style="height:90px; width:250px; overflow: hidden;">
                <p class="card-text">{{$content->subject}}</p>
            </div>
          </div>
        </a>
        <div class="card-body" style="height: 50px !important;">
          <a href="/profile/{{$content->user->id}}" class="card-link" style="text-transform:capitalize;">
            <img src="/png/user.png" alt="user" style="height:20px; width:20px">
            {{explode(' ',trim($content->user->name))[0]}}
          </a>
          <a href="#" class="card-link">
            <img src="/png/clock.png" alt="hours" style="height:20px; width:20px">
            {{$content->created_at->diffForHumans()}}
          </a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
  <div align="pagination justify-content-center" align="center" style="padding-left:45%;">
    {!! $konten->render() !!}
  </div>
</div>
@endsection
