
        @if ($tickets->isEmpty())
            <h4>Well, done!</h4>
        @else
            <ul class="list-group">
            @foreach($tickets as $ticket)
                <li class="list-group-item">
                     <p><strong>{{ $ticket-> raised }}</strong> / {{ $ticket->phone}}</p>
                     <p><a href="#">{{ $ticket->description }}</a></p>
                     <hr>
                     @if ($ticket->category_id)
                        категория: <span class="label label-default">{{ $ticket->category->name }}</span>&nbsp;&nbsp;
                     @endif
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
                        статус: <strong>{{ $ticket->status }}</strong>&nbsp;&nbsp;
                     @endif
                     @if ($ticket->user_id)
                        выполняет: <strong>{{ $ticket->user->name }}</strong>&nbsp;&nbsp;
                     @endif
                </li>
            @endforeach
            </ul>
        @endif
