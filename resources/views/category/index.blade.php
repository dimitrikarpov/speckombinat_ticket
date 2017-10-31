@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Категории</h3></div>

            <table class="table">
                <tr>
                    <th>название</th>
                    <th>описание</th>
                    <th></th>
                    <th><a href="/category/create" class="btn btn-primary btn-sm">Добавить</a></th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->archived == 1 ? 'X': '' }}</td>
                    <td>
                        <a href="/category/{{ $category->id }}/edit" class="btn btn-default btn-xs">edit</a>&nbsp;&nbsp;
                        <a href="/category/{{ $category->id }}/destroy" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?');">delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
