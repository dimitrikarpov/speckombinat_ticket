<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tab = 'todo')
    {
        switch($tab) {
            case 'todo':
                $tickets = Ticket::getNew();
                break;
            case 'doing':
                $tickets = Ticket::getDoing();
                break;
            case 'done':
                $tickets = Ticket::getDone();
                break;
            default:
                $tickets = Ticket::getNew();
        }

        return view('home', compact(['tickets', 'tab']));
    }

    /**
     * Show the current user dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $tickets = Ticket::getCurrentUserActive();

        return view('dashboard', compact('tickets'));
    }
}
