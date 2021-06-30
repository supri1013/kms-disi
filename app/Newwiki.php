<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Newwiki extends Model
{
    protected $table = 'newwiki';
    protected $fillable = ['judul','deskripsi','isi_artikel','gambar','editor','sumber','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dimilikibanyakuser()
    {
        return $this->hasMany(User::class);
    }


    public function getGambar()
    {
        if($this->gambar){
            return asset ('assets/images/foto/'. $this->gambar);
        }
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y H:i');
    }
}
