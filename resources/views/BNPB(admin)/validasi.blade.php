@extends('layouts')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-lg-auto">
      <form action="/validasi" method="POST">
        <div class="form-group">
          <label for="nomorktp">Nomor KTP user yang akan divalidasi</label>
          <input type="text" name="nomorktp" class="form-control" placeholder="No.KTP">
        </div>
        <div class="form-group">
          <label>Verifikasi</label>
          <select name="verifikasi" class="form-control" style="width:300px;">
            <option value="Diterima">Diterima</option>
            <option value="Tidak Diterima">Tidak Diterima</option>
          </select>
        </div>
        <div class="form-group">
              <label for="message-text" class="col-form-label">Pesan:</label>
              <textarea class="form-control" id="message-text" style="height:100px; width:500px;"></textarea>
            </div>
          {{ csrf_field()}}
          <button type="submit" class="btn btn-primary">Verifikasi</button>
      </form>
    </div>
  </div>
</div>
@endsection
