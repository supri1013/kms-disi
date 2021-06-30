<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Dokumenfile extends Model
{
    protected $table = 'dokumens';
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y H:i');
    }

}
