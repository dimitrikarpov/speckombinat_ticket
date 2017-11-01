<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $formTitle }}</div>
            <div class="panel-body">

                <form class="form-horizontal" method="POST" action="{{ $action }}">

                    {{ csrf_field() }}

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{ $slot }}

                </form>

            </div>
        </div>
    </div>
</div>
