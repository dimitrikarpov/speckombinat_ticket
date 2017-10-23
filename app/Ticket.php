<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Get the user that owns the Ticket
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the category that ticket belongs to
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
