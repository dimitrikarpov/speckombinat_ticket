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
                    <th>
                        <a href="/category/create" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        @if($category->archived == 1)
                            <span class="glyphicon glyphicon-eye-close"></span>
                        @endisset
                    </td>
                    <td>
                        <a href="/category/{{ $category->id }}/edit" class="btn btn-default btn-xs">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        &nbsp;&nbsp;
                        <a href="/category/{{ $category->id }}/destroy" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?');">
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
