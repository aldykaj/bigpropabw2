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
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin-top:50px;margin-bottom:100px;">
  <div class="row">
    <div class="col-8">
      <h1 id="judul">{{$content->judul}}</h1>
      <h5>{{$content->kategori}}</h5>
    </div>
    <div class="col-4">
      @auth
      @if (Auth::user()->hasRole('admin'))
      <div align="center" style="margin: 20px 0;">
        <!-- Button trigger modal -->
        @if ($content->jenis =='tervalidasi')
        <a href="/admin" class="btn btn-secondary" style="width:200px;">
          Tervalidasi
        </a>
        @else
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="width:200px;">
            Verifikasi
          </button>
        @endif
      </div>
      @endif
      @endauth
    </div>
  </div>

  <div class="row">
    <div class="col-8">
      <a href="#">
        <img src="{{ asset('storage/gambarpendaftar/'.$content->gambar) }}" alt=" " style="margin-bottom: 30px; width:730px;height:400px;">
      </a>
      <p id="artikel">{{$content->subject}}</p>
    </div>
    <div class="col-4">
      <div class="embed-responsive embed-responsive-16by9" align="center" style="margin-bottom:40px;">
        <iframe align="middle" class="embed-responsive-item" src="https://www.youtube.com/embed/7jFXLAj1n5Q?ecver=2" allowfullscreen></iframe>
      </div>
      <a href="#"><img src="{{ asset('storage/fotoktp/'.$content->user->foto_ktp) }}" style="width:350px; height:200px"></a>
      <h5 style="margin-top:10px; text-align:center;">No KTP. {{$content->user->no_ktp}}</h5>
    </div>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/daftarkontributor/{{$content->slug}}/validasi" method="POST">
                <div class="form-group">
                  <input type="text" name="nomorktp" value="{{$content->user->no_ktp}}" hidden></input>
                  <input type="text" name="validasi" value="{{$content->slug}}" hidden>
                  <label>Verifikasi</label>
                  <select name="verifikasi" class="form-control" style="width:300px;">
                    <option value="Diterima">Diterima</option>
                    <option value="Tidak Diterima">Tidak Diterima</option>
                  </select>
                </div>
                <div class="form-group">
                      <label for="message-text" class="col-form-label">Pesan:</label>
                      <textarea class="form-control" id="message-text" style="height:100px; width:400px;"></textarea>
                    </div>
                  {{ csrf_field()}}
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Verifikasi</button>
            </div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection
