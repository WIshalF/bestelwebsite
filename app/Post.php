<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('post');


    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
