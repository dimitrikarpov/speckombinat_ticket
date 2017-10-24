<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['raised', 'phone', 'description', 'category_id'];

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

    /**
     * Get tickets with 'new' attribute
     */
    public static function getNew()
    {
        $all = self::all();

        return $all->filter(function($value, $key) {
            return $value->status == 'new';
        });
    }
}
