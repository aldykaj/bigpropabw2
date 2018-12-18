<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;
use App\ContentComment;
use App\User;
use Auth;

class ContentCommentController extends Controller
{
    public function store(Request $request,$id)
    {
      $this->validate($request,[
        'subject'   =>'required',
      ]);

      $content = Content::findOrFail($id);
        $contents = ContentComment::create([
          'subject'=>$request->subject,
          'content_id'=>$id,
          'user_id'=>Auth::user()->id,
        ]);
        return redirect('/contents/'.$content->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      /*$content = content::where('slug',$slug)->first();
      if (empty($content)) {
        die('hard');
        abort(404);
      }
      $namauser = User::where('id',$content->user_id)->get();
      return view('kontributor.kontensingle',compact('content'),compact('namauser'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$comment = ContentComment::findOrFail($id);
        return view('content-comments.edit',compact('comment'));*/
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
        /*$content = Content::findOrFail($id);

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
      return redirect('contents');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comment = ContentComment::findOrFail($id);
      $contentt = Content::where('id',$comment->content_id)->get();
      if(Auth::user()->id==$comment->user_id)
      $comment->delete();
      else abort(403);

      return redirect('/contents/'.$comment->content->slug);
    }
}
