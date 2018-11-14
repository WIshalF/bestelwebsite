<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donateur extends Model
{
    protected $fillable =['user_id',
        'voor_naam',
        'achter_naam',
        'geboortedag',
        'geslacht'];
    protected $dates = [ 'geboortedag'];

   public function showGender($geslacht)
{
    return $geslacht == 1 ? 'Male' : 'Female';
}
    public function fullName()
    {
        return $this->voor_naam . ' ' . $this->achter_naam;
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

