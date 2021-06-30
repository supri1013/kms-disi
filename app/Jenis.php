<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $guarded = ['id'];

    public function newfaq()
    {
        return $this->hasMany(Newfaq::class);
    }

    public function newwiki()
    {
        return $this->hasMany(Newwiki::class);
    }

    public function newisu()
    {
        return $this->hasMany(Newisu::class);
    }

    public function forumdiskusi()
    {
        return $this->hasMany(Forumdiskusi::class);
    }

  

}
