<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class content extends Model
{
  protected $fillable = [
      'judul', 'slug','subject' , 'gambar','video','user_id','kategori','jenis',
  ];
    public function user()
    {
      return $this-> belongsTo('App\User');
    }

    public function comments()
    {
      return $this-> hasMany('App\ContentComment');
    }

    public function likes()
    {
        return $this-> morphMany('App\Like','likeable');
    }

    public function is_liked()
    {
        return $this->likes->where('user_id',Auth::user()->id)->count();
    }
}
