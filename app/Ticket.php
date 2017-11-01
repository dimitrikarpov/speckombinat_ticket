<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
    public function scopeTodo($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Get tickets with 'in progress' and 'awaiting' status
     */
    public function scopeDoing($query)
    {
        return $query->whereIn('status', ['in progress', 'awaiting']);
    }

    /**
     * Get tickets with 'closed' status
     */
    public function scopeDone($query)
    {
        return $query->where('status', 'closed');
    }

    /**
     * Scope a query with given user where status is not 'closed'
     */
    public function scopeOfUser($query, $user)
    {
        return $query->where('user_id', $user->id)->whereNotIn('status', ['closed']);
    }

    public static function fetchByParams(array $params = [])
    {
        $params['date_from'] = $params['date_from'] ?? Carbon::now('Europe/Kiev')->subDays(14)->toDateString();
        $params['date_to'] = $params['date_to'] ?? Carbon::now('Europe/Kiev')->toDateString();
        $params['category_id'] = $params['category_id'] ?? null;
        $params['user_id'] = $params['user_id'] ?? null;

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
