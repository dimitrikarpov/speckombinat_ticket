@component('ticket.form.layout', ['action' => "/ticket/$ticket->id/update", 'formTitle' => 'Редактировать заявку'])

<div class="form-group">
  <label for="inputName" class="col-sm-2 control-label">Имя</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputName" placeholder="Имя" name="raised" required minlenght="5" value="{{ $ticket->raised }}">
  </div>
</div>

<div class="form-group">
  <label for="inputPhone" class="col-sm-2 control-label">Телефон</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputPhone" placeholder="Телефон" name="phone" required minlenght="5" maxlenght="13" value="{{ $ticket->phone }}">
  </div>
</div>

<div class="form-group">
  <label for="inputDescription" class="col-sm-2 control-label">Описание</label>
  <div class="col-sm-10">
    <textarea class="form-control" id="inputDescription" placeholder="Описание" name="description" required rows="4" cols="80">{{ $ticket->description }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="selectCategory" class="col-sm-2 control-label">Категория</label>
  <div class="col-sm-10">
      <select class="form-control" id="selectCategory" name="category_id">
        <option></option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $ticket->category_id == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
        @endforeach
    </select>
  </div>
</div>

<div class="form-group">
    <label for="inputNotes" class="col-sm-2 control-label">Заметки</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputNotes" placeholder="Описание" name="notes" rows="4" cols="80">{{ $ticket->notes }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="selectStatus" class="col-sm-2 control-label">Статус</label>
    <div class="col-sm-10">
        <select class="form-control" id="selectStatus" name="status">
            <option value="new" {{ $ticket->status == 'new'? 'selected' : ''}}>new</option>
            <option value="in progress" {{ $ticket->status == 'in progress'? 'selected' : ''}}>in progress</option>
            <option value="awaiting" {{ $ticket->status == 'awaiting'? 'selected' : ''}}>awaiting</option>
            <option value="closed" {{ $ticket->status == 'closed'? 'selected' : ''}}>closed</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="selectPriority" class="col-sm-2 control-label">Приоритет</label>
    <div class="col-sm-10">
        <select class="form-control" id="selectPriority" name="priority">
            <option value="low" {{ $ticket->priority == 'low'? 'selected' : ''}}>low</option>
            <option value="normal" {{ $ticket->priority == 'normal'? 'selected' : ''}}>normal</option>
            <option value="high" {{ $ticket->priority == 'high'? 'selected' : ''}}>high</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="selectUser" class="col-sm-2 control-label">Выполняет</label>
    <div class="col-sm-10">
        <select class="form-control" id="selectUser" name="user_id">
            @foreach($users as $user)
              <option value="{{ $user->id}}" {{ $ticket->user_id == $user->id ? 'selected':''}}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
</div>

@endcomponent
