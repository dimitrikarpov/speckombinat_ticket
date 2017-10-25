@foreach($tickets as $ticket)
<div class="col-md-4 col-sm-6">
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                <h4>{{ $ticket-> raised }} <small>{{ $ticket->phone}}</small></h4>
            </div>
        </div>

        <div class="panel-body">
            <p><a href="#">{{ $ticket->description }}</a></p>

            @if ($ticket->user_id)
                <p>выполняет: <strong>{{ $ticket->user->name }}</strong></p>
            @endif
        </div><!-- panel-body -->

        <div class="panel-footer">
            @if ($ticket->status)
                статус: <strong>{{ $ticket->status }}</strong>
            @endif

            &nbsp;&nbsp;

            @if ($ticket->priority)
                приоритет:
                @switch ($ticket->priority)
                    @case('low')
                        <span class="label label-info">{{ $ticket->priority }}</span>
                        @break
                    @case('normal')
                        <span class="label label-success">{{ $ticket->priority }}</span>
                        @break
                    @case('high')
                        <span class="label label-danger">{{ $ticket->priority }}</span>
                        @break
                @endswitch
            @endif

            &nbsp;&nbsp;

            @if ($ticket->category_id)
                категория: <span class="label label-default">{{ $ticket->category->name }}</span>
            @endif
        </div>

    </div><!-- panel -->
</div><!-- col -->
@endforeach
