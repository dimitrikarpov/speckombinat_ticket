@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
            <a href="#" class="btn btn-default">Новая</a>
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
