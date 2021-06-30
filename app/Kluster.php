<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kluster extends Model
{
    protected $table = 'kluster';
    protected $guarded = ['id'];

    public function newisu()
    {
        return $this->hasMany(Newisu::class);
    }

}
