<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $categories = Category::notArchived()->get();
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
        $params['date_from'] = request()->input('date_from') ?? Carbon::now('Europe/Kiev')->subDays(14)->toDateString();
        $params['date_to'] = request()->input('date_to') ?? Carbon::now('Europe/Kiev')->toDateString();
        $params['category_id'] = request()->input('category_id') ?? null;
        $params['user_id'] = request()->input('user_id') ?? null;

        return redirect()->route('tickets', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::notArchived()->get();

        if (Auth::check()) {
            $users = User::all();

            return view('ticket.create', compact('categories', 'users'));
        }

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
        $categoriesIds = Category::notArchived()->get()->pluck('id')->toArray();
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

        $ticket = Ticket::create($validatedData);

        $ticket->status = $validatedData['status'] ?? 'new';
        $ticket->priority = $validatedData['priority'] ?? 'normal';
        $ticket->user_id = $validatedData['user_id'] ?? null;
        $ticket->notes = $validatedData['notes'] ?? null;
        $ticket->save();

        if (Auth::check()) {
            return redirect('dashboard')->with('status', 'Ticket added');
        } else {
            return redirect('/')->with('status', 'Заявка добавлена!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::notArchived()->get();
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
        $categoriesIds = Category::notArchived()->get()->pluck('id')->toArray();
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

        return redirect('home')->with('status', 'Ticket updated!');
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
