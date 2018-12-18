<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile($id = null)
    {
      if($id==null){
        $user = User::findOrFail(Auth::user()->id);
      }

      else{
        $user = User::findOrFail($id);
      }
      $konten = Content::where('user_id',$user->id)->get();
      return view('/profile',compact('user'),compact('konten'));
    }
    public function home() {

    	  $konten = Content::where('jenis','like','konten')->orderBy('id', 'DESC')->paginate(3);

        return view('/umum/umum',compact('konten'));
      }
}
