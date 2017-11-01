@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Новая категория</h3></div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/category/store">
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
                    <label for="inputName" class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Название" name="name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="textareaDescription" class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="textareaDescription" placeholder="Описание" name="description" rows="4" cols="80"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="archived"> Не используется
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Добавить</button>
                    </div>
                  </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
