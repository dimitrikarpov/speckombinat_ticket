
        @if ($tickets->isEmpty())
            <h4>Well, done!</h4>
        @else
            @foreach($tickets as $ticket)
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p><strong>{{ $ticket-> raised }}</strong> / {{ $ticket->phone}}</p>
                        <p><a href="#">{{ $ticket->description }}</a></p>
                        <p>
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
                         @if ($ticket->status)
                            статус: <strong>{{ $ticket->status }}</strong>
                         @endif
                        </p>
                        @if ($ticket->category_id)
                           <p>категория: <span class="label label-default">{{ $ticket->category->name }}</span></p>
                        @endif
                        @if ($ticket->user_id)
                            <p>выполняет: <strong>{{ $ticket->user->name }}</strong></p>
                        @endif
                    </div><!-- panel-body -->
                </div><!-- panel -->


             </div><!-- col -->
            @endforeach
        @endif
