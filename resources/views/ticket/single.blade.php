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
        <div class="panel panel-{{ $ticket->priority == 'high'?'danger':'default' }}">
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
            @isset ($ticket->notes)
                <p class="text-muted"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;{{ $ticket->notes }}</p>
            @endisset
        </div><!-- panel-body -->

        <div class="panel-footer">
            @isset($ticket->status)
                <div class="btn-group">
                    <a href="#" class="btn btn-default btn-xs disabled">статус</a>
                    <a href="#" class="btn btn-{{ $colors[$ticket->status] }} btn-xs disabled">{{ $ticket->status }}</a>
                </div>
            @endisset

            &nbsp;&nbsp;

            @isset($ticket->priority)
                <div class="btn-group">
                    <a href="#" class="btn btn-default btn-xs disabled">приоритет</a>
                    <a href="#" class="btn btn-{{ $colors[$ticket->priority] }} btn-xs disabled">{{$ticket->priority }}</a>
                </div>
            @endisset

            &nbsp;&nbsp;

            @isset($ticket->category_id)
                <span class="label label-default">{{ $ticket->category->name }}</span>
            @endisset
        </div>

    </div><!-- panel -->
</div><!-- col -->
