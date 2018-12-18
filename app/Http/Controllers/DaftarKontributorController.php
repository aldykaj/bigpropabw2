<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Content;
use Auth;
use App\UserRole;

class DaftarKontributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontributor.signupkontributor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'no_ktp'    =>'required|min:5',
        'foto_ktp'  =>'required|max:2000|mimes:jpg,jpeg,png',
        'subject'   =>'required|min:10',
        'kategori'  =>'required',
        'judul'     =>'required|min:2',
        'gambarpendaftar' => 'required|max:2000|mimes:jpg,jpeg,png',

      ]);
        $slug = str_slug($request->judul,'-').'-'.time();

      //nama file gambar
      $filename1 = $request->no_ktp.time().'.png';
      $filename2 = $slug.time().'.png';
      $contents = content::create([
          'judul'=> $request->judul,
          'slug'=> $slug,
          'subject'=>$request->subject,
          'kategori'=>$request->kategori,
          'user_id'=>Auth::user()->id,
          'gambar'=>$filename2,
          'jenis'=> 'daftar',
        ]);

        $users = Auth::user()->where('id', Auth::user()->id )->update(['no_ktp' => $request->no_ktp]);
        $users1 = Auth::user()->where('id', Auth::user()->id )->update(['foto_ktp' => $filename1]);

        //upload file
        $request->file('foto_ktp')->storeAs('public/fotoktp',$filename1);
        $request->file('gambarpendaftar')->storeAs('public/gambarpendaftar',$filename2);

        return redirect('/daftarkontributor/'.$slug);
    }

    /**
     * Display the specontencified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $content = content::where('slug',$slug)->first();
        if (empty($content)) {
          die('hard');
          abort(404);
        }
        return view('kontributor.kontenpendaftar',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
