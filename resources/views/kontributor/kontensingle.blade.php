@extends('layouts')

@section('css')
<style>
  #judul::first-line{
    text-transform: capitalize;
  }
  #artikel{
    text-indent: 50px;
    text-align: justify;
  }
</style>
@endsection

@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin-top:50px;margin-bottom:20px !important;">
  <div class="row">
    <div class="col-8">
      <h1 id="judul">{{$content->judul}}</h1>
      <h5>{{$content->kategori}}</h5>
      @foreach($namauser as $user)
      <span>Oleh :</span>  <a href="/profile/{{$user->id}}">{{$user->name}}</a>
      @endforeach
    </div>
    <div class="col-4">
      @auth
      @if (Auth::user()->id==$content->user_id)
      <div align="center">
        <a href="/contents/{{$content->id}}/edit" style="width:200px;" class="btn btn-secondary" style="margin: 20px 0;">Edit Konten</a>
        <div style="margin: 20px 0;">
          <form action="/contents/{{$content->id}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" style="width:200px;" class="btn btn-secondary">Hapus Konten</button>
          </form>
        </div>
      </div>
      @endif
      @endauth
    </div>
  </div>

  <div class="row">
    <div class="col-8">
      <a href="#">
        <img src="{{ asset('storage/gambar/'.$content->gambar) }}" alt=" " style="margin-bottom: 30px; width:730px;height:400px;">
      </a>
      <p id="artikel">{{$content->subject}}</p>
      <div class="like_wrapper">
        <div class="btn {{$content->is_liked() ? 'btn-danger btn-unlike' : 'btn-outline-success btn-like'}}" data-model-id="{{$content->id}}" data-type="1">
          {{$content->is_liked() ? 'Unlike' : 'Like'}}</div>
        <div class="total_like">
            <span class="like_number">{{ $content->likes->count() }}</span> Total Like
        </div>
      </div>
    </div>

    <div class="col-4">
      <div class="embed-responsive embed-responsive-16by9" align="center" style="margin-bottom:40px;">
        <iframe align="middle" class="embed-responsive-item" src="https://www.youtube.com/embed/7jFXLAj1n5Q?ecver=2" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<div class="container" style="margin-bottom:80px;">
  <div class="row">
    <div class="col-8">
      @foreach ($commentuser as $komen)
        <div class="container shadow p-3 mb-5 bg-white rounded" style="margin-bottom:20px !important;">
          <p>{{$komen->subject}}</p>
          <p>Ditulis Oleh: <a href="/profile/{{$komen->user->id}}">{{$komen->user->name}}</a></p>
          @auth
          @if (Auth::user()->id==$komen->user_id)
          <form action="/contents-comment/{{$komen->id}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-outline-primary">Hapus</button>
          </form>
          @endif
          @endauth
        </div>
      @endforeach
      <form action="/contents-comment/{{$content->id}}" method="post">
        <span>Isi Komentar</span>
        <div class="input-group" style="marign-top:50px;margin-bottom:20px;">
          <textarea class="form-control" placeholder="Tulis Komentar Disini" name="subject" aria-label="With textarea" style="height:200px;"></textarea>
        </div>
        {{ csrf_field() }}
        <div align="">
          <button type="submit" class="btn btn-primary">Komentar</button>
        </div>
      </form>
    </div>
    <div class="col-4">

    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/content.js') }}" charset="utf-8"></script>
@endsection
