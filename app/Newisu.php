<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Newisu extends Model
{
    protected $table = 'newisu';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    public function kluster()
    {
        return $this->belongsTo(Kluster::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y H:i');
    }
}
