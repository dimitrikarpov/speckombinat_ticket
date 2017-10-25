<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    /**
     * Get categories that not archived
     */
    public static function actual()
    {
        $all = self::all();
        
        return $all->reject(function($c) {
            return $c->archived;
        });
    }
}
