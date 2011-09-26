<? _JS ('form-preferences') ?>

<form
  action="<?= @$content['form-preferences']['form-action'] ?>"
  method="post"
>

<div class="form">

<div class="form-control">
  <div class="label">
    <p><label>Оформление</label></p>
    <p class="help"><a href="http://blogengine.ru/help/themes/" target="_blank">Как создать свою тему?</a>&nbsp;<img width="10" height="8" src="<?= _IMGSRC ('blank-window.gif') ?>" alt="" /></p>
  </div>
  <input type="hidden"
    id="template"
    name="template"
		value="<?= $content['form-preferences']['template-name'] ?>"
  />
  
  <noscript>
  <div class="small">
  <i>Включите в браузере Джаваскрипт для выбора темы оформления</i>
  </div>
  </noscript>
  
  <div id="e2-template-selector" style="display: none">
  <div class="admin-links">
  <? foreach ($content['form-preferences']['templates'] as $template) { ?>
  <div class="
    e2-template-preview<? if ($template['current?']) echo ' e2-current-template-preview' ?>
  " value="<?= $template['name'] ?>"
  >
    <img src="<?= $template['preview'] ?>" alt="<?= $template['display-name'] ?>" 
      width="100" height="120"
    /><br />
    <a class="dashed" onclick="return false"><?= $template['display-name'] ?></a>
  </div>
  <? } ?>
  </div>
  </div>
  
</div>


<div class="form-control">
  <div class="label input-label"><label>Заметки</label></div>
  <label>показывать по&nbsp; 
  <input type="text"
    class="text"
    style="width: 2.33em"
    id="notes-per-page"
    name="notes-per-page"
    maxlength="3"
    value="<?= $content['form-preferences']['notes-per-page'] ?>"
    />
  на странице
  </label>
</div>


<div class="form-control">
  <div class="label"><label>Комментарии</label></div>
  <div class="form-subcontrol-master">
    <label class="checkbox">
    <input
      type="checkbox"
      id="comments-on"
      name="comments-on"
      class="checkbox"
      <?= @$content['form-preferences']['comments-on?']? ' checked="checked"' : ''?>
    /> разрешить
    </label><br />
  </div>
  
  <div id="comments-on-slaves">
    <div class="form-subcontrol-slave">
      <label class="checkbox">
      <input
        type="checkbox"
        id="comments-fresh-only"
        name="comments-fresh-only"
        class="checkbox"
        <?= @$content['form-preferences']['comments-fresh-only?']? ' checked="checked"' : ''?>
      /> только к свежим заметкам
      </label><br />
    </div>
    <div class="form-subcontrol-slave">
      <label class="checkbox">
      <input
        type="checkbox"
        id="email-notify"
        name="email-notify"
        class="checkbox"
        <?= @$content['form-preferences']['email-notify?']? ' checked="checked"' : ''?>
      /> и присылать по почте на адрес&nbsp;
      </label>
      <input type="text"
        class="text width-2"
        id="email"
        name="email"
        value="<?= $content['form-preferences']['email'] ?>"
      /><br />
    </div>
  </div>
</div>

<div class="form-control">
  <div class="label"><label>Блоки</label></div>
  <label class="checkbox">
  <input
    type="checkbox"
    id="favourites-block"
    name="favourites-block"
    class="checkbox"
    <?= @$content['form-preferences']['favourites-block?']? ' checked="checked"' : ''?>
  /> избранные заметки
  </label><br />
</div>

<div class="form-control">
  <label class="checkbox">
  <input
    type="checkbox"
    id="hot-block"
    name="hot-block"
    class="checkbox"
    <?= @$content['form-preferences']['hot-block?']? ' checked="checked"' : ''?>
  /> самые комментируемые за месяц
  </label><br />

</div>

<div class="submit-box">
<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-preferences']['submit-text'] ?>"
  /><span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span><br />
</div>
</div>


<div class="form-control">
  <div class="form-control-sublabel">
  <p class="admin-links clear">Администрирование:&nbsp;
  <a href="<?= @$content['admin-hrefs']['password'] ?>">пароль</a>,&nbsp;
  <a href="<?= @$content['admin-hrefs']['database'] ?>">соединение&nbsp;с&nbsp;базой</a></p>
  </div>
</div>



</div>

</form>