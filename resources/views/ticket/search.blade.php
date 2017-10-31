@extends('layouts.app')

@section('content')
@php
    $date_from = app('request')->input('date_from');
    $date_to = app('request')->input('date_to');
    $category_id = app('request')->input('category_id');
    $user_id = app('request')->input('user_id');
@endphp
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                        from: {{ $date_from }}
                        to: {{ $date_to }}
                        @isset($category_id)
                            category: <span class="label label-default">{{ $categories->find($category_id)->name }}</span>
                        @endisset
                        @isset($user_id)
                            выполняет: <span class="label label-default">{{ $users->find($user_id)->name }}</span>
                        @endisset
                    <button class="btn btn-primary pull-right btn-xs" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false">Search</button></div>
                <div class="collapse" id="collapseExample">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/redirector">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputDateFrom" class="col-sm-2 control-label">date from</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputDateFrom" name="date_from" value="{{ $date_from }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDateTo" class="col-sm-2 control-label">date to</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputDateTo" name="date_to" value="{{ $date_to }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="selectCategory" class="col-sm-2 control-label">категория</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="selectCategory" name="category_id">
                                        <option></option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id}}" {{ $category_id == $category->id ? 'selected':''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="selectUser" class="col-sm-2 control-label">выполняет</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="selectUser" name="user_id">
                                        <option></option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected':''}}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- panel -->
        </div><!-- col -->
    </div><!-- row -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <table class="table">
                    <tr>
                        <th>имя</th>
                        <th>phone</th>
                        <th>description</th>
                        <th>category</th>
                        <th>user</th>
                        <th>view</th>
                    </tr>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->raised }}</td>
                        <td>{{ $ticket->phone }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>
                        @isset($ticket->category_id)
                            {{ $ticket->category->name }}
                        @endisset
                        </td>
                        <td>
                        @isset ($ticket->user_id)
                            {{ $ticket->user->name }}
                        @endisset
                        </td>
                        <td><a href="/ticket/{{$ticket->id}}">view</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
