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

<div class="col-md-4 col-sm-6">
    @if ($ticket->priority == 'high')
        <div class="panel panel-danger">
    @else
        <div class="panel panel-default">
    @endif
        <div class="panel-heading">
            <div class="panel-title">
                <h4>{{ $ticket-> raised }} <small>{{ $ticket->phone}}</small></h4>
            </div>
        </div>

        <div class="panel-body">
            <p><a href="/ticket/{{ $ticket->id }}/edit">{{ $ticket->description }}</a></p>

            @isset($ticket->user_id)
                <p><span class="glyphicon glyphicon-user"></span><strong> {{ $ticket->user->name }}</strong></p>
            @endisset
        </div><!-- panel-body -->

        <div class="panel-footer">
            @isset($ticket->status)
                статус: <span class="label label-{{ $colors[$ticket->status] }}">{{ $ticket->status }}</span>
            @endisset

            &nbsp;&nbsp;

            @isset($ticket->priority)
                приоритет: <span class="label label-{{ $colors[$ticket->priority] }}">{{ $ticket->priority }}</span>
            @endisset

            &nbsp;&nbsp;

            @isset($ticket->category_id)
                категория: <span class="label label-default">{{ $ticket->category->name }}</span>
            @endisset
        </div>

    </div><!-- panel -->
</div><!-- col -->
