<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phonenumber','location', 'no_ktp','foto_ktp', 'verifikasi' , 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function contents()
    {
      return $this->hasMany('app\Content');
    }

    /* Method untuk yang mendefinisikan relasi antar model user dan model role */
    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }


    /* Method untuk menambahkan role (hak akses) baru pada user */
    public function putRole($role)
    {
        if (is_string($role))
        {
            $role = Role::whereRoleName($role)->first();
        }
        return $this->roles()->attach($role);
    }

   /* Method untuk menghapus role (hak akses) pada user */
   public function forgetRole($role)
   {
       if (is_string($role))
       {
           $role = Role::whereRoleName($role)->first();
       }
       return $this->roles()->detach($role);
   }

    /* Method untuk mengecek apakah user yang sedang login punya hak akses untuk mengakses page sesuai rolenya */
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role)
        {
            if ($role->role_name === $roleName) return true;
        }
            return false;
    }

    public function comments()
    {
      return $this->hasMany('app\ContentComment');
    }



}
