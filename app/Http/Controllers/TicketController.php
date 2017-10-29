<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::actual();
        $users = User::all();

        $categoriesIds = $categories->pluck('id')->toArray();
        $usersIds = $users->pluck('id')->toArray();

        $request = request();

        $params = $request->validate([
            'date_from' => 'date',
            'date_to' => 'date',
            'category_id' => Rule::in($categoriesIds),
            'user_id' => Rule::in($usersIds)
        ]);

        $tickets = Ticket::fetchByParams($params);

        return view('ticket.search', compact('categories', 'users', 'tickets'));
    }

    public function redirector()
    {
        $params = [];

        if (request()->input('date_from')) {
            $params['date_from'] = request()->input('date_from');
        }

        if (request()->input('date_to')) {
            $params['date_to'] = request()->input('date_to');
        }

        if (request()->input('category_id')) {
            $params['category_id'] = request()->input('category_id');
        }

        if (request()->input('user_id')) {
            $params['user_id'] = request()->input('user_id');
        }

        return redirect()->route('tickets', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::actual();

        return view('ticket.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoriesIds = Category::actual()->pluck('id')->toArray();

        $validatedData = $request->validate([
            'raised' => 'required|string|min:5',
            'phone' => 'required',
            'description' => 'required',
            'category_id' => Rule::in($categoriesIds)
        ]);

        Ticket::create($validatedData);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::actual();
        $users = User::all();

        return view('ticket.edit', compact(['ticket', 'categories', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $categoriesIds = Category::actual()->pluck('id')->toArray();
        $usersIds = User::all()->pluck('id')->toArray();

        $validatedData = $request->validate([
            'raised' => 'required|string|min:5',
            'phone' => 'required',
            'description' => 'required',
            'category_id' => Rule::in($categoriesIds),
            'status' => Rule::in(['new', 'in progress', 'awaiting', 'closed']),
            'priority' => Rule::in(['low', 'normal', 'high']),
            'user_id' => Rule::in($usersIds),
            'notes' => 'min:10'
        ]);

        $ticket->fill($validatedData);
        $ticket->status = $validatedData['status'];
        $ticket->priority = $validatedData['priority'];
        $ticket->user_id = $validatedData['user_id'];
        $ticket->notes = $validatedData['notes'];
        $ticket->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
