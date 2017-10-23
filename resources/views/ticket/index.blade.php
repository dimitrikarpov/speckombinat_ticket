@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Новая заявка</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="/new">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Имя" name="raised">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputPhone" class="col-sm-2 control-label">Телефон</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputPhone" placeholder="Телефон" name="phone">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label">Описание</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputDescription" placeholder="Описание" name="description" rows="4" cols="80"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            @foreach($actualCategories as $category)
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="{{ $category->name }}">
                                {{ $category->description }}
                              </label>
                            </div>
                            @endforeach
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="other" checked>
                                Ничего из вышеперечисленного (другое)
                              </label>
                            </div>

                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Отправить</button>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
