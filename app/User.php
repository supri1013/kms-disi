<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role', 'email', 'password', 'jabatan','telepon','alamat','gambar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function forumdiskusi()
    {
       return $this->hasMany(Forumdiskusi::class);
    }
    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    
    public function faq()
    {
        return $this->hasMany(Faq::class);
    }
    
    public function getGambar()
    {
        if($this->gambar){
            return asset('assets/images/foto/'.$this->gambar);
        }
        return asset('assets/images/foto/default.png');
        
    }


    public function isu()
    {
        return $this->hasMany(Isu_permasalahan::class);
    }
    

}
