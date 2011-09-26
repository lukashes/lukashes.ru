<? _JS ('form-comment') ?>

<form
  action="<?=$content['form-comment']['form-action']?>"
  method="post"
  accept-charset="UTF-8"
  name="form-comment"
  id="form-comment"
>

<input
  type="hidden"
  name="note-id"
  value="<?= @$content['form-comment']['.note-id'] ?>"
/>

<input
  type="hidden"
  name="comment-id"
  value="<?= @$content['form-comment']['.comment-id'] ?>"
/>

<input
  type="hidden"
  name="from"
  value="<?= @$content['form-comment']['.from'] ?>"
/>

<input
  type="hidden"
  name="already-subscribed"
  value="<?= @$content['form-comment']['.already-subscribed?'] ?>"
/>

<div class="form">

<div class="form-control">
  <div class="label input-label"><label>Имя и&nbsp;фамилия</label></div>
  <input type="text"
    class="text required width-2"
    tabindex="1"
    id="name"
    name="name"
    value="<?= @$content['form-comment']['name'] ?>"
  />
</div>

<div class="form-control">
  <div class="label input-label"><label>Эл. почта</label></div>
  <div style="position: relative">
    <?/* горшочек с мёдом для спамеров: */?>
    <div style="position: absolute; z-index: 0; left: 0; top: 0">
    <input type="text"
      class="text width-2"
      style="outline: none"
      tabindex="-1"
      name="email"
      autocomplete="off"
      value=""
    />
    </div>
    <div style="position: relative; z-index: 1; left: 0; top: 0">
    <?/* настоящее поле */?>
    <input type="text"
      class="text required width-2"
      tabindex="2"
      id="email"
      name="<?= $content['form-comment']['email-field-name'] ?>"
      value="<?= @$content['form-comment']['email'] ?>"
    />
    </div>
  </div>
  <p class="small baseline">
    <?= $content['form-comment']['create:edit?']? 'адрес не будет опубликован<br />' : ''?>
  </p>
</div>

<div class="form-control">
  <div class="label"><p><label>Текст</label></p>
  <!--
    <p class="help"><a href="http://blogengine.ru/help/text/">Форматирование текста</a></p>
    -->
  </div>
  <textarea name="text"
    class="required full-width"
    id="text"
    tabindex="3"
    style="height: 16.7em; overflow-x: hidden; overflow-y: visible"
  ><?=$content['form-comment']['text']?></textarea>
  <p class="small baseline">
    <?= $content['form-comment']['create:edit?']? 'ХТМЛ не работает<br />' : ''?>
  </p>
</div>

<? if ($content['form-comment']['show-subscribe?']) { ?>
<div class="form-control">
  <label class="checkbox">
  <input
    type="checkbox"
    name="subscribe"
    class="checkbox"
    <?= @$content['form-comment']['subscribe?']? ' checked="checked"' : ''?>
  /> Получать комментарии других по почте
  </label><br />
</div>
<? } ?> 

<? if (array_key_exists ('subscription-status', $content['form-comment'])) { ?>
<div class="form-control">
  <p><?= $content['form-comment']['subscription-status'] ?></p>
</div>
<? } ?>


<div class="submit-box">
<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-comment']['submit-text'] ?>"
  /><span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
</div>
</div>

</div>

</form>