@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Новый пользователь</h3></div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/user/store">
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
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Имя</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputName" placeholder="Имя" name="name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail" placeholder="email" name="email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-4 control-label">Пароль</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="inputPassword" placeholder="пароль" name="password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                  </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
