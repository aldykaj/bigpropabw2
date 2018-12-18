@extends('layouts')

@section('css')
<link href="/css/kontributor/signupkontributor.css" rel="stylesheet">
@endsection

@section('content')
<div class="container kotak ">
  <h2 style="text-align:center;">ZIAGA</h2>
  <div class="row justify-content-md-center">
    <div class="col col-md-2">

    </div>
    <div class="col-lg-auto">
      <p style="text-align:center;">Buat Konten</p>
      <form class="" action="/contents" method="post" enctype="multipart/form-data">
        <div style="margin-bottom:20px;">
          <input type="text" class="form-control" name="judul" placeholder="Judul Konten">
          @if ($errors->has('judul'))
          <span class="alert-danger">
             <strong>{{ $errors->first('judul') }}</strong>
          </span>
          @endif
        </div>
          <div class="row" style="margin-bottom:20px;">
            <div class="col">
              <div class="custom-file">
               <input type="file" class="custom-file-input" id="customFile">
               <label class="custom-file-label" for="customFile">Upload Video</label>
             </div>
            </div>
            <div class="col">
              <div class="custom-file">
               <input name="gambarkonten" type="file" class="custom-file-input" id="customFile">
               <label class="custom-file-label" for="customFile">Upload Gambar</label>
             </div>
            </div>
            @if ($errors->has('gambarkonten'))
            <span class="alert-danger">
               <strong>{{ $errors->first('gambarkonten') }}</strong>
            </span>
            @endif
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
          <span>Isi Konten</span>
          <div class="input-group" style="margin-bottom:20px;">
            <textarea class="form-control" name="subject" aria-label="With textarea" style="height:200px;">{{old('subject')}}</textarea>
            @if ($errors->has('subject'))
            <span class="alert-danger">
               <strong>{{ $errors->first('subject') }}</strong>
            </span>
            @endif
          </div>
          {{ csrf_field() }}
          <div align="center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

      </form>
    </div>
    <div class="col col-md-2">

    </div>
  </div>
</div>
@endsection
