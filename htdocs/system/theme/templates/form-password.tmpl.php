<? _JS ('form-password') ?>

<form
  action="<?= @$content['form-password']['form-action'] ?>"
  method="post"
  class="e2-enterable"
>

<div class="form">

<div class="form-control">
  <div class="icon">
    <img src="<?= _IMGSRC ('lock.gif') ?>" width="24" height="24" alt="Пароль" style="margin-top: -4px" />
  </div>
  <input type="text"
    class="text required width-2"
    id="password"
    name="password"
		value=""
  />
  <div class="form-control-sublabel">отображается при вводе</div>
</div>


<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-password']['submit-text'] ?>"
  /><br />
</div>

</div>

</form>
