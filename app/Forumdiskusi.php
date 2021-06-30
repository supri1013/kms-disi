<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Forumdiskusi extends Model
{
    protected $table = 'forumdiskusi';
    protected $fillable = ['judul','konten','user_id'];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y H:i');
    }
}
