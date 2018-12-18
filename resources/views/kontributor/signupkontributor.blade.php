@extends('layouts')

@section('css')
<link href="/css/kontributor/signupkontributor.css" rel="stylesheet">
@endsection

@section('content')
<div class="container kotak">
  <h2 style="text-align:center;">ZIAGA</h2>
  <div class="row justify-content-md-center">
    <div class="col col-md-2">

    </div>
    <div class="col-lg-auto">
      <p style="text-align:center;">Please complete to create constributor account</p>
      <form action="/daftarkontributor" method="POST" enctype="multipart/form-data">
          <div style="margin-bottom:20px;">
            <input type="text" name="no_ktp" class="form-control" placeholder="No.KTP/SIM">
            @if ($errors->has('no_ktp'))
            <span class="alert-danger">
               <strong>{{ $errors->first('no_ktp') }}</strong>
            </span>
            @endif
          </div>
           <div class="custom-file" style="margin-bottom:20px;">
            <input type="file" name="foto_ktp" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Upload Foto KTP/SIM</label>
            @if ($errors->has('foto_ktp'))
            <span class="alert-danger">
               <strong>{{ $errors->first('foto_ktp') }}</strong>
            </span>
            @endif
          </div>
          <div class="row" style="margin-bottom:20px;">
            <div class="col">
              <input type="text" name="judul" class="form-control" placeholder="Judul Konten">
              @if ($errors->has('judul'))
              <span class="alert-danger">
                 <strong>{{ $errors->first('judul') }}</strong>
              </span>
              @endif
            </div>
            <div class="col">
              <div class="custom-file">
               <input type="file" name="gambarpendaftar" class="custom-file-input" id="customFile">
               <label class="custom-file-label" for="customFile">Upload Gambar</label>
             </div>
            </div>
          </div>
          <div class="input-group mb-3" style="margin-bottom:20px;">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
            </div>
            <select class="custom-select" name="kategori" id="inputGroupSelect01">
              <option value="1" disabled selected>Choose an option</option>
              <option value="Banjir">Banjir</option>
              <option value="Tanah Longsor">Tanah Longsor</option>
              <option value="Kebakaran Hutan">Kebakaran Hutan</option>
              <option value="Gempa Bumi">Gempa Bumi</option>
              <option value="Tsunami">Tsunami</option>
              <option value="Kekeringan">Kekeringan</option>
              <option value="Gunung Meletus">Gunung Meletus</option>
              <option value="Pemanasan Global">Pemanasan Global</option>
              <option value="Angin Topan">Angin Topan</option>
              <option value="Badai">Badai</option>
              <option value="Lain-Lain">Lain-Lain</option>
            </select>
            @if ($errors->has('kategori'))
            <span class="alert-danger">
               <strong>{{ $errors->first('kategori') }}</strong>
            </span>
            @endif
          </div>
          <div style="margin-bottom:20px;">
            <span>Isi Konten</span>
            <div class="input-group" style="height:200px">
              <textarea name="subject" class="form-control" aria-label="With textarea" style="width:100px !important;"></textarea>
            </div>
            @if ($errors->has('subject'))
            <span class="alert-danger">
               <strong>{{ $errors->first('subject') }}</strong>
            </span>
            @endif
          </div>

          <div align="center">
            {{ csrf_field()}}
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
    <div class="col col-md-2">

    </div>
  </div>
</div>
@endsection
