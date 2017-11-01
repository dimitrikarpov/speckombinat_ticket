@extends('layouts.admin')

@section('content')

@includeWhen(session('status'), 'layouts.notification')

<div class="row">

    @forelse ($tickets as $ticket)
        @include('ticket.single')
    @empty
        <h4>Well, done!</h4>
    @endforelse
    
</div>
@endsection
