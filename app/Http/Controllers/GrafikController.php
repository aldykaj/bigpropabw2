<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;
use App\User;
use Khill\Lavacharts\Lavacharts;

class GrafikController extends Controller
{
    public function index(){
      $lava             = new Lavacharts; // See note below for Laravel
      $banjir           = Content::where('kategori','like','Banjir')->count();
      $tanahlongsor     = Content::where('jenis','like','konten')->where('kategori','like','Tanah Longsor')->count();
      $kebakaranhutan   = Content::where('jenis','like','konten')->where('kategori','like','Kebakaran Hutan')->count();
      $gempabumi        = Content::where('jenis','like','konten')->where('kategori','like','Gempa Bumi')->count();
      $tsunami          = Content::where('jenis','like','konten')->where('kategori','like','Tsunami')->count();
      $kekeringan       = Content::where('jenis','like','konten')->where('kategori','like','Kekeringan')->count();
      $gunungmeletus    = Content::where('jenis','like','konten')->where('kategori','like','Gunung Meletus')->count();
      $pemanasanglobal  = Content::where('jenis','like','konten')->where('kategori','like','Pemanasan Global')->count();
      $angintopan       = Content::where('jenis','like','konten')->where('kategori','like','Angin Topan')->count();
      $badai            = Content::where('jenis','like','konten')->where('kategori','like','Badai')->count();
      $lainlain         = Content::where('jenis','like','konten')->where('kategori','like','Lain-Lain')->count();

      $reasons = \Lava::DataTable();
      $reasons->addStringColumn('Kategori')
              ->addNumberColumn('Jumlah Konten')
              ->addRow(['Banjir', $banjir])
              ->addRow(['Tanah Longsor', $tanahlongsor])
              ->addRow(['Kebakaran Hutan', $kebakaranhutan])
              ->addRow(['Gempa Bumi', $gempabumi])
              ->addRow(['Tsunami', $tsunami])
              ->addRow(['Kekeringan', $kekeringan])
              ->addRow(['Gunung Meletus', $gunungmeletus])
              ->addRow(['Pemanasan Global', $pemanasanglobal])
              ->addRow(['Angin Topan', $angintopan])
              ->addRow(['Badai', $badai])
              ->addRow(['Lain-Lain', $lainlain]);

      $Chart = \Lava::DonutChart('grafik', $reasons, ['title' => 'Grafik Isi Konten']);
      return view('grafik');
    }
    /*public function index(){
      $stocksTable = \Lava::DataTable();
      $stocksTable->addStringColumn('Reasons')
        ->addNumberColumn('Percent')
        ->addRow(['Check Reviews', 5])
        ->addRow(['Watch Trailers', 2])
        ->addRow(['See Actors Other Work', 4])
        ->addRow(['Settle Argument', 89]);

      // Random Data For Example

      //DON'T pass $Chart object to view, you get it via its label
      //options here: http://lavacharts.com/#datatables
      $Chart = \Lava::DonutChart('IMDB', $stocksTable, [
          'title' => 'Reasons I visit IMDB'
      ]);
      return view('grafik');
    }*/
}
