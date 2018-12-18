@extends('layouts')

@section('content')
  <div id="stock-div" style="height:500px;"></div>
  {!! \Lava::render('DonutChart', 'grafik', 'stock-div') !!}
@endsection
