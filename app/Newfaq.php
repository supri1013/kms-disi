<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Newfaq extends Model
{
    protected $table = 'newfaq';
    protected $fillable = ['user_id','pertanyaan','jawaban','jenis_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y H:i');
    }


}
