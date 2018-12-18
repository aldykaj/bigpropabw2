<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentComment;
use App\Content;
use App\User;
use App\Like;
use Auth;

class LikeController extends Controller
{
    public function like($type, $model_id)
    {
      if($type == 1){
        $model_type="App\Content";
        $model = Content::where('user_id',$model_id);
      }
      else{
        $model_type="App\ContentComment";
        $model = ContentComment::where('user_id',$model_id);
      }

      //user tidak boleh like berkali-kali
      //Like::where('user_id',Auth::user()->id)->count();

      $likes = Like::where('user_id',Auth::user()->id)->where('likeable_id',$model_id)->first();
      if(empty($likes)){
        $like = Like::create([
                'user_id' =>Auth::user()->id,
                'likeable_id' =>$model_id,
                'likeable_type' =>$model_type,
              ]);
      }
    }

    public function unlike($type,$model_id)
    {
      if($type == 1){
        $model_type="App\Content";
        $model = Content::where('user_id',$model_id);
      }
      else{
        $model_type="App\ContentComment";
        $model = ContentComment::where('user_id',$model_id);
      }
      $likes = Like::where('user_id',Auth::user()->id)->where('likeable_id',$model_id)->first();
      if($likes)
      {
          Like::where('user_id',Auth::user()->id)->where('likeable_id',$model_id)->where('likeable_type',$model_type)->delete();
      }

    }
}
