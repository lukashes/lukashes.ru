<form
  action="<?= @$content['form-database']['form-action'] ?>"
  method="post"
>

<div class="form">

<div class="form-control">
  <div class="label">
    <label>Сервер</label>
  </div>
  <input type="text"
    name="db-server"
    id="db-server"
    class="text input-editable width-2"
    value="<?= @$content['form-database']['db-server'] ?>"
  />
</div>

<div class="form-control">
  <div class="form-subcontrol">
    <div class="label">
      <label>Имя пользователя и&nbsp;пароль</label>
    </div>
    <input type="text"
      name="db-user"
      id="db-user"
    class="text input-editable width-2"
      value="<?= @$content['form-database']['db-user'] ?>"
    />
  </div>
  <div class="form-subcontrol">
    <input type="text"
      name="db-password"
      id="db-password"
    class="text input-editable width-2"
      value="<?= @$content['form-database']['db-password'] ?>"
    />
  </div>
</div>

<div class="form-control">
  <div class="label">
    <label>Название&nbsp;базы</label>
  </div>
    <input type="text"
    name="db-database"
    id="db-database"
    class="text input-editable width-2"
    value="<?= @$content['form-database']['db-database'] ?>"
  />
</div>

<div class="form-control">
  <div class="label">
    <label>Префикс таблиц</label>
  </div>
    <input type="text"
    name="db-prefix"
    id="db-prefix"
    class="text input-editable width-1"
    value="<?= @$content['form-database']['db-prefix'] ?>"
  />
</div>

<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-database']['submit-text'] ?>"
  /><!--<span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span><br />-->
</div>

</div>


</form>