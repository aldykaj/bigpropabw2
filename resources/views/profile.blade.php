@extends('layouts')

@section('content')
<div class="container" style="margin-top:50px;margin-bottom:200px;">
  <div class="row">
    <div class="col-8">
      <img src="#" alt="">
      <table>
        <tr>
          <td><h5>Nama</h5></td>
          <td><h5>:</h5></td>
          <td><h5 style="text-transform:capitalize;">{{$user->name}}</h5></td>
        </tr>
        <tr>
          <td><h5>Email</h5></td>
          <td><h5>:</h5></td>
          <td><h5>{{$user->email}}</h5></td>
        </tr>
        <tr>
          <td><h5>Nomor Telepon</h5></td>
          <td><h5>:</h5></td>
          <td><h5>{{$user->phonenumber}}</h5></td>
        </tr>
        <tr>
          <td><h5>Alamat</h5></td>
          <td><h5>:</h5></td>
          <td><h5 style="text-transform:capitalize;">{{$user->location}}</h5></td>
        </tr>
        <tr>
          <td><h5>Nomor KTP</h5></td>
          <td><h5>:</h5></td>
          <td><h5>{{$user->no_ktp}}</h5></td>
        </tr>
        <tr>
          <td><h5>Verfikasi</h5></td>
          <td><h5>:</h5></td>
          @if($user->verifikasi == "Diterima")
          <td><h5>Terverifikasi</h5></td>
          @else
          <td><h5>Belum Terverifikasi</h5></td>
          @endif
        </tr>
      </table>
    </div>
    <div class="col-4">
      <h5>Daftar Konten</h5>
      <div class="list-group">
      @foreach ($konten as $content)
      @if($content->jenis == 'konten')
      <a href="/contents/{{$content->slug}}" class="list-group-item list-group-item-action">{{$content->judul}}</a>
      @else
      <a href="/daftarkontributor/{{$content->slug}}" class="list-group-item list-group-item-action">{{$content->judul}}</a>
      @endif
      @endforeach
    </div>
    </div>
  </div>
</div>
@endsection
