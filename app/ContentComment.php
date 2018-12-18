<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentComment extends Model
{
  protected $fillable = [
    'subject','user_id','content_id',
  ];
    public function user()
    {
      return $this->belongsTo('app\User');
    }

    public function content()
    {
      return $this->belongsTo('app\Content');
    }

    public function likes()
    {
        return $this-> morphMany('app\Like','likeable');
    }

    public function is_liked()
    {
        return $this->likes->where('user_id',Auth::user()->id)->count();
    }
}
