@extends('layouts')

@section('title')
  Web Kesiagaan Bencana
@endsection

@section('content')
<img src="homepage.png" class="img-fluid" alt="Responsive image">

<div class="container" style="margin-bottom: 100px; margin-top: 50px;">
<div class="media">
  <img class="align-self-center mr-3" src="{{ asset('png/typhoon.png') }}" alt="Generic placeholder image" style="height:200px;width:200px;">
  <div class="media-body align-self-center">
    <h2 class="mt-0">APA ITU ZIAGA?</h2>
    <p style="font-size:20px;">ZIAGA adalah sebuah perangkat lunak berbasis web yang berfungsi untuk memberikan masyarakat pengetahuan dalam menanggulangi kejadian pra bencana dan pasca bencana.</p>
    <a href="{{url('/faq')}}">Lihat Lebih Lanjut</a>
  </div>
</div>
</div>

<div class="container homepage1">
  <h2 style="margin: 20px 0">KENAPA HARUS KESIAPSIAGAAN?</h2>
  <div class="embed-responsive embed-responsive-16by9 videohomepage1">
    <iframe align="middle" class="embed-responsive-item videohomepage" src="https://www.youtube.com/embed/7jFXLAj1n5Q?ecver=2" allowfullscreen></iframe>
  </div>
</div>

<div class="container shadow p-3 mb5 bg-white" style="margin-bottom: 50px; border: 0.5px solid #dddddd;">
  <div class="judul">
    <h2>BARU HARI INI</h2>
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
  <div align="center">
    <a href="{{url('/contents/filter/Terbaru')}}" class="btn btn-primary btn-lg" style="margin-top:20px;">More</a>
  </div>
</div>
@endsection
