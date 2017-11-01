<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public $timestamps = false;

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    /**
     * Get categories that not archived
     */
    public function scopeNotArchived($query)
    {
        return $query->where('archived', '0');
        // $all = self::all();
        //
        // return $all->reject(function($c) {
        //     return $c->archived;
        // });
    }
}
