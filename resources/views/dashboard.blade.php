@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
...
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        @if ($tickets->isEmpty())
            <h4>Well, done!</h4>
        @else
            @include('ticket.list')
        @endif
    </div>
</div>
@endsection
