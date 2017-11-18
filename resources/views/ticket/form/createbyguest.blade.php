@component('ticket.form.layout', ['action' => '/ticket/store', 'formTitle' => 'Создать заявку'])

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
    <div class="radio">
      <label>
      <input type="radio" name="category_id" value="" checked>
      Категория не указана
      </label>
    </div>
    @foreach($categories as $category)
      <div class="radio">
        <label>
        <input type="radio" name="category_id" value="{{ $category->id }}">
        {{ $category->description }}
        </label>
      </div>
    @endforeach
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
</div>

@endcomponent
