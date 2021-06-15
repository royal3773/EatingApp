<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
    public function admin()
    {
        return $this->belongsTo('App\Model\Admin');
    }
}
