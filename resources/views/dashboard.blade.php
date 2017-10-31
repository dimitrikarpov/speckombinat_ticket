@extends('layouts.admin')

@section('content')

@includeWhen(session('status'), 'layouts.notification')
<div class="row">
    <h1 class="page-header">Мои заявки</h1>

    @forelse ($tickets as $ticket)
        @include('ticket.single')
    @empty
        <h4>Well, done!</h4>
    @endforelse
</div>
@endsection
