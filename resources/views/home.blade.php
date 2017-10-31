@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-pills nav-justified">
                @if ($tab == 'todo')
                    <li role="presentation" class="active"><a href="/home/todo">ToDo</a></li>
                @else
                    <li role="presentation"><a href="/home/todo">ToDo</a></li>
                @endif

                @if ($tab == 'doing')
                    <li role="presentation" class="active"><a href="/home/doing">Doing</a></li>
                @else
                    <li role="presentation"><a href="/home/doing">Doing</a></li>
                @endif

                @if ($tab == 'done')
                    <li role="presentation" class="active"><a href="/home/done">Done</a></li>
                @else
                    <li role="presentation"><a href="/home/done">Done</a></li>
                @endif
            </ul>
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
