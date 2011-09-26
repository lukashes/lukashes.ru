<script type="text/javascript" src="system/ctrlenter.js"></script>

<form
  id="form-note-time"
  action="<?= $content['form-note-finetune']['form-action'] ?>"
  method="post"
>

<input
  type="hidden"
  name="note-id"
  value="<?= @$content['form-note-finetune']['.note-id'] ?>" 
/>

<div class="form">

<div class="form-control">
  »зменение времени приводит к изменению адреса этой и окружающих заметок.
</div>

<div class="form-control">
  <div class="form-subcontrol">
    <div class="label"><label>–азница с&nbsp;√ринвичем</label></div>
    <?= @$content['form-note-finetune']['timezone-selector'] ?>
  </div>
  
  <div class="form-subcontrol">
    <label class="checkbox">
    <input
      type="checkbox"
      class="checkbox"
      name="is_dst"
      id="is_dst"
      <?= @$content['form-note-finetune']['dst-checked?']? ' checked="checked"' : '' ?>
    /> с переходом на летнее врем€
    </label>
  </div>

</div>

<div class="form-control">
  <div class="form-control-sublabel">
  ѕри публикации заметки еЄ часовой по€с обычно определ€етс€ автоматически. ¬ случае неудачи используетс€ <a href="<?= @$content['form-note-finetune']['default-timezone-href'] ?>">часовой по€с по умолчанию</a>.
  </div>
</div>


<div class="form-control">
  <div class="label"><label>¬рем€ публикации</label></div>
  <input type="radio" class="radio" name="stamp_radio" id="stamp_radio_shift" checked="checked" value="shift" />
  <label for="stamp_radio_shift" class="radio">не мен€ть</label><br />
  <input type="radio" class="radio" name="stamp_radio" id="stamp_radio_update" value="update" />
  <label for="stamp_radio_update" class="radio">изменить на текущее</label><br />
  <input type="radio" class="radio" name="stamp_radio" id="stamp_radio_new" value="new" />
  <label for="stamp_radio_new" class="radio">изменить на:</label><br />
  <input type="text"
    class="text"
    name="stamp"
    id="stamp"
    value="<?= @$content['form-note-finetune']['stamp-formatted'] ?>"
    onfocus="document.getElementById ('stamp_radio_new').checked = 'checked'"
  />
</div>


<div class="form-control">
  <div class="label"><label>¬рем€ правки</label></div>
  <input type="radio" class="radio" name="lastmodified_radio" id="lastmodified_radio_shift" checked="checked" value="shift" />
  <label for="lastmodified_radio_shift" class="radio">не мен€ть</label><br />
  <input type="radio" class="radio" name="lastmodified_radio" id="lastmodified_radio_update" value="update" />
  <label for="lastmodified_radio_update" class="radio">изменить на текущее</label><br />
  <input type="radio" class="radio" name="lastmodified_radio" id="lastmodified_radio_new" value="new" />
  <label for="lastmodified_radio_new" class="radio">изменить на:</label><br />
  <input type="text"
    class="text"
    name="lastmodified"
    id="lastmodified"
    value="<?= @$content['form-note-finetune']['lastmodified-formatted'] ?>"
    onfocus="document.getElementById ('lastmodified_radio_new').checked = 'checked'"
  />
</div>



<div class="submit-box">
<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-note-finetune']['submit-text'] ?>"
  /><span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span><br />
</div>
</div>

</div>

</form>
