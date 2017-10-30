<form class="form-horizontal" method="POST" action="/ticket/store2">
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
    <label for="inputName" class="col-sm-2 control-label">Имя</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Имя" name="raised" required minlenght="5">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPhone" class="col-sm-2 control-label">Телефон</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPhone" placeholder="Телефон" name="phone" required minlenght="5" maxlenght="13">
    </div>
  </div>

  <div class="form-group">
    <label for="inputDescription" class="col-sm-2 control-label">Описание</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputDescription" placeholder="Описание" name="description" required rows="4" cols="80"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="selectCategory" class="col-sm-2 control-label">Категория</label>
    <div class="col-sm-10">
        <select class="form-control" name="category_id" id="selectCategory">
            <option></option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>

    </div>
  </div>

  <div class="form-group">
      <label for="inputNotes" class="col-sm-2 control-label">Заметки</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputNotes" placeholder="Описание" name="notes" required rows="4" cols="80"></textarea>
      </div>
  </div>

  <div class="form-group">
      <label for="selectStatus" class="col-sm-2 control-label">Статус</label>
      <div class="col-sm-10">
          <select class="form-control" id="selectStatus" name="status">
              <option value="new">new</option>
              <option value="in progress" selected>in progress</option>
              <option value="awaiting">awaiting</option>
              <option value="closed">closed</option>
          </select>
      </div>
  </div>

  <div class="form-group">
      <label for="selectPriority" class="col-sm-2 control-label">Приоритет</label>
      <div class="col-sm-10">
          <select class="form-control" id="selectPriority" name="priority">
              <option value="low">low</option>
              <option value="normal" selected>normal</option>
              <option value="high">high</option>
          </select>
      </div>
  </div>

  <div class="form-group">
      <label for="selectUser" class="col-sm-2 control-label">Выполняет</label>
      <div class="col-sm-10">
          <select class="form-control" id="selectUser" name="user_id">
              @foreach($users as $user)
                <option value="{{ $user->id}}" {{ Auth::id() == $user->id ? 'selected':''}}>{{ $user->name }}</option>
              @endforeach
          </select>
      </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
  </div>

</form>
