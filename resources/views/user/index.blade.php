@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Пользователи</h3></div>

            <table class="table">
                <tr>
                    <th>имя</th>
                    <th>email</th>
                    <th>
                        <a href="/user/create" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-default btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        &nbsp;&nbsp;
                        <a href="/user/{{ $user->id }}/destroy" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?');">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
