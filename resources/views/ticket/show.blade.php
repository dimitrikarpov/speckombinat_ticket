@extends('layouts.admin')

@section('content')
<div class="row">
    <h1 class="page-header">Просмотр заявки</h1>
    <div class="col-md-3"></div>

    @include('ticket.single')

    @if (url()->current() != url()->previous())
        <a href="{{ url()->previous() }}" class="btn btn-default">назад</a>
    @endif
</div>
@endsection
