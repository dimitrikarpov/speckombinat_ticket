@extends('layouts.app')

@section('content')

    @includeWhen(session('status'), 'layouts.notification')

    @include('ticket.form.unauth')

@endsection
