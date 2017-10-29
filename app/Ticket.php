<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
     * Get tickets with 'new' status
     */
    public static function getNew()
    {
        $all = self::all();

        return $all->filter(function($value, $key) {
            return $value->status == 'new';
        });
    }

    /**
     * Get tickets with 'in progress' and 'awaiting' status
     */
    public static function getDoing()
    {
        $all = self::all();

        return $all->filter(function ($value, $key) {
            return $value->status == 'in progress' || $value->status == 'awaiting';
        });
    }

    /**
     * Get tickets with 'closed' status
     */
    public static function getDone()
    {
        $all = self::all();

        return $all->filter(function ($value, $key) {
            return $value->status == 'closed';
        });
    }

    public static function fetchByParams(array $params = [])
    {
        // default params
        $defaultParams = collect([
            'date_from' => Carbon::now('Europe/Kiev')->toDateString(),
            'date_to' => Carbon::now('Europe/Kiev')->subDays(14)->toDateString(),
            'category_id' => null,
            'user_id' => null
        ]);

        $params = $defaultParams->merge($params)->toArray();

        $filter = Ticket::where('status', 'closed');

        $filter->whereDate('created_at', '>', $params['date_from']);
        $filter->whereDate('updated_at', '<', $params['date_to']);

        if ($params['category_id']) {
            $filter->where('category_id', $params['category_id']);
        }

        if ($params['user_id']) {
            $filter->where('user_id', $params['user_id']);
        }

        return $filter->get();
    }
}
