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
@foreach($tickets as $ticket)
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

            @if ($ticket->user_id)
                <p>выполняет: <strong>{{ $ticket->user->name }}</strong></p>
            @endif
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
</div><!-- col -->
@endforeach
