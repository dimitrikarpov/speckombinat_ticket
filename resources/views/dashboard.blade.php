@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
            <a href="/ticket/add" class="btn btn-default">Новая</a>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">

        @forelse ($tickets as $ticket)
            @include('ticket.single')
        @empty
            <h4>Well, done!</h4>
        @endforelse
        
    </div>
</div>
@endsection
