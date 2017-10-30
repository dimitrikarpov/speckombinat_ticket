@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Новая заявка</div>
                <div class="panel-body">
                    @include('ticket.form.add')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
