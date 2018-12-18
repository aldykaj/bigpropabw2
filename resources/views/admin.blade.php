@extends('layouts')

@section('content')
<div class="container" align="center" style="margin-top:30px;margin-bottom:300px;">
  <div class="panel panel-default">
      <div class="panel-body">
          <div class="alert alert-success">
              <p>
                  Halaman Admin Untuk Validasi Kontributor
              </p>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover tabel-bordered">
                          <thead>
                              <tr>
                                  <th width="5">No</th>
                                  <th>Member Name</th>
                                  <th>Email</th>
                                  <th>No KTP</th>
                                  <th>Foto KTP</th>
                                  <th>Link Konten</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($users as $i => $user)
                                  <tr>
                                      <td>{{ $i+1 }}</td>
                                      <td><a href="/profile/{{$user->id}}">{{ $user->name }}</a></td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->no_ktp }}</td>
                                      <td>foto ktp</td>
                                      @foreach($content as $i => $konten)
                                      @if ($user->id == $konten->user_id)
                                      <td><a href="/daftarkontributor/{{ $konten->slug }}">Lihat Konten</a></td>
                                      @endif
                                      @endforeach
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
