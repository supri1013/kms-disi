<?php

namespace App;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = ['konten','user_id','forumdiskusi_id','parent'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forumdiskusi()
    {
        return $this->belongsTo(Forumdiskusi::class);
    }

    public function childs()
    {
       return $this->hasMany(Komentar::class,'parent');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y H:i');
    }
}
