<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContentComment;
use App\Content;
use App\User;
use Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $search_q = urldecode($request->input('search'));
      $jeniskonten = 'konten';
      if(!empty($search_q))
        $konten = Content::where('judul','like','%'.$search_q.'%')->where('jenis',$jeniskonten)->orderBy('id', 'DESC')->paginate(9);
      else
        $konten = Content::where('jenis',$jeniskonten)->inRandomOrder()->paginate(9);
      return view('kontributor.konten',compact('konten'));
    }

    public function filter($kategori)
    {
      $konten = Content::where('jenis','like','konten')->where('kategori',$kategori)->orderBy('id', 'DESC')->paginate(9);
      return view('kontributor.konten',compact('konten'));
    }

    public function filter2($berdasarkan){

        if ($berdasarkan == 'Terbaru') {
          $konten = Content::where('jenis','like','konten')->orderBy('id', 'DESC')->paginate(9);
        }
        return view('kontributor.konten',compact('konten'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontributor.create');
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
        'subject'   =>'required|min:20',
        'kategori'  =>'required',
        'judul'     =>'required|min:2',
        'gambarkonten' => 'required|max:2000|mimes:jpg,jpeg,png',

      ]);
        $slug = str_slug($request->judul,'-').'-'.time();

      //nama file gambar
      $filename = $slug.time().'.png';

        $contents = content::create([
          'judul'=> $request->judul,
          'slug'=> $slug,
          'subject'=>$request->subject,
          'kategori'=>$request->kategori,
          'user_id'=>Auth::user()->id,
          'gambar'=>$filename,
          'jenis' =>'konten',
        ]);
        //upload file
        $request->file('gambarkonten')->storeAs('public/gambar',$filename);
        return redirect('/contents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $content = content::where('slug',$slug)->first();
      if (empty($content)) {
        die('hard');
        abort(404);
      }
      $commentuser = ContentComment::where('content_id',$content->id)->get();
      $namauser = User::where('id',$content->user_id)->get();
      return view('kontributor.kontensingle',compact('content'),compact('namauser','commentuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('kontributor.edit',compact('content'));
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
        $content = Content::findOrFail($id);

        if(Auth::user()->id==$content->user_id){
          if ($request->gambarkonten == null) {
            $filename = $request->gambarkonten1;
          }
          else {
            //nama file gambar
            $slug = str_slug($request->judul,'-').'-'.time();
            $filename = $slug.time().'.png';
            //upload file
            $request->file('gambarkonten')->storeAs('gambar',$filename);
          }
          $content->update([
            'judul'=> $request->judul,
            'subject'=>$request->subject,
            'kategori'=>$request->kategori,
            'user_id'=>Auth::user()->id,
            'gambar'=>$filename,
          ]);
        }
      else abort(403);
      return redirect('contents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $content = Content::findOrFail($id);
      $comment = ContentComment::where('content_id',$id);
      if(Auth::user()->id==$content->user_id){
        $content->delete();
        $comment->delete();
      }
      else abort(403);

      return redirect('/contents');
    }
}
