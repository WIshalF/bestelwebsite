<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vraag extends Model
{
    protected $fillable = [
        'post'
    ];
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
