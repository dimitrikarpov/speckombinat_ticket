@extends('layouts.admin')

@section('content')

@php
    $colors = [
        'low' => 'info',
        'normal' => 'success',
        'high' => 'danger',
        'new' => 'warning',
        'in progress' => 'primary',
        'awaiting' => 'info',
        'closed' => 'success'
    ];
@endphp

<div class="row">
    <h1 class="page-header">Просмотр заявки</h1>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-{{ $ticket->priority == 'high' ? 'danger' : 'default' }}">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>{{ $ticket-> raised }} <small>{{ $ticket->phone }}</small></h4>
                </div>
            </div>

            <div class="panel-body">
                <p><a href="/ticket/{{ $ticket->id }}/edit">{{ $ticket->description }}</a></p>

                @if ($ticket->user_id)
                    <p>выполняет: <strong>{{ $ticket->user->name }}</strong></p>
                @endif

                @isset ($ticket->notes)
                    <p>{{ $ticket->notes }}</p>
                @endisset
            </div><!-- panel-body -->

            <div class="panel-footer">
                @if ($ticket->status)
                    статус: <span class="label label-{{ $colors[$ticket->status] }}">{{ $ticket->status }}</span>
                @endif

                &nbsp;&nbsp;

                @if ($ticket->priority)
                    приоритет: <span class="label label-{{ $colors[$ticket->priority] }}">{{ $ticket->priority }}</span>
                @endif

                &nbsp;&nbsp;

                @if ($ticket->category_id)
                    категория: <span class="label label-default">{{ $ticket->category->name }}</span>
                @endif
            </div>
        </div><!-- panel -->
        @if (url()->current() != url()->previous())
            <a href="{{ url()->previous() }}" class="btn btn-default">назад</a>
        @endif
    </div><!-- col -->
</div>
@endsection
