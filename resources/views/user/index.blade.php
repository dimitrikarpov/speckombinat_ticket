@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Пользователи</h3></div>

                <table class="table">
                    <tr>
                        <th>имя</th>
                        <th>email</th>
                        <th><a href="/user/create" class="btn btn-primary btn-sm">Добавить</a></th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="/user/{{ $user->id }}/edit" class="btn btn-default btn-xs">edit</a>&nbsp;&nbsp;
                            <a href="/user/{{ $user->id }}/destroy" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?');">delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
