@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">

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

                    <hr>

                    @if ($tab == 'todo')
                        @include ('ticket.list')
                    @elseif ($tab == 'doing')
                        @include ('ticket.list')
                    @elseif ($tab == 'done')
                        @include ('ticket.list')
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
