<? _JS ('form-tag') ?>

<form
  action="<?= @$content['form-tag']['form-action'] ?>"
  method="post"
>                                   

<input
  type="hidden"
  name="tag-id"
  value="<?= @$content['form-tag']['.tag-id'] ?>" 
/>

<div class="form">

<div class="form-control">
  <div class="label"><label>Название</label></div>
  <input type="text"
    class="text big required width-2"
    id="tag"
    name="tag"
    value="<?= @$content['form-tag']['tag'] ?>"
  />
</div>

<div class="form-control">
  <div class="label"><label>В&nbsp;адресной строке</label></div>
  <input type="text"
    class="text required width-2"
    id="urlname"
    name="urlname"
    value="<?= @$content['form-tag']['urlname'] ?>"
  />
</div>

<div class="form-control">
  <div class="label"><label>Описание</label></div>
  <textarea name="description"
    class="width-4"
    id="text"
    style="height: 10em; overflow-x: hidden; overflow-y: visible"
  ><?=$content['form-tag']['description']?></textarea>
</div>

<div class="submit-box">
<div>
  <input
    type="submit"
    id="submit-button"
    value="<?= @$content['form-tag']['submit-text'] ?>"
  /><span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span><br />
</div>
</div>

<? if (array_key_exists ('delete-href', $content['form-tag'])) { ?>

<div class="form-control">
  <div class="form-control-sublabel">
  <p class="admin-links clear">
  <? if (array_key_exists ('delete-href', $content['form-tag'])) { ?>
  <a href="<?=$content['form-tag']['delete-href']?>" class="delete">Удаление тега</a>
  <? } ?>
  </p>
  </div>
</div>
<? } ?>

</div>

</form>

