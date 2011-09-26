<? _JS ('form-note') ?>
<? _JS ('form-note-tags') ?>
<? _JS ('ajaxupload.jquery') ?>


<form
  id="form-note"
  action="<?=$content['form-note']['form-action']?>"
  enctype="multipart/form-data" 
  method="post"
  accept-charset="utf-8"
>

<input
  type="hidden"
  id="note-id"
  name="note-id"
  value="<?= @$content['form-note']['.note-id'] ?>"
/>

<input
  type="hidden"
  name="from"
  value="<?= @$content['form-note']['.from'] ?>"
/>

<input
  type="hidden"
  name="old-tags-hash"
  value="<?= @$content['form-note']['.old-tags-hash'] ?>"
/>

<input
  type="hidden"
  id="action"
  name="action"
  value="<?= @$content['form-note']['.action'] ?>"
/>

<input
  type="hidden"
  id="instant-publish"
  name="instant-publish"
  value="<?= @$content['form-note']['.instant-publish'] ?>"
/>

<input
  type="hidden"
  id="gmt-offset"
  name="gmt-offset"
  value="unknown"
/>

<script>
d = new Date ()
document.getElementById ('gmt-offset').value = - d.getTimezoneOffset()
</script>

<a id="e2-note-livesave-action" href="<?= $content['form-note']['form-note-livesave-action'] ?>"></a>
<a id="e2-file-upload-action" href="<?= $content['form-note']['form-file-upload-action'] ?>"></a>
<a id="e2-file-remove-action" href="<?= $content['form-note']['form-file-remove-action'] ?>"></a>

<div class="form" id="e2-note-form-wrapper">

<div class="form-control">

  <div class="form-subcontrol">
    <div class="label input-label"><label>Название</label></div>
    <input type="text"
      class="text big required unedited width-4"
      autocomplete="off"
      tabindex="1"
      id="title"
      name="title"
      value="<?= @$content['form-note']['title'] ?>"
    />
  </div>
  
  <div class="form-subcontrol">

    <div class="label">
    <p><label>Текст</label></p>
    <p class="help"><a href="http://blogengine.ru/help/text/" target="_blank">Форматирование текста</a>&nbsp;<img width="10" height="8" src="<?= _IMGSRC ('blank-window.gif') ?>" alt="" /></p>
    <p class="small baseline">
      <span id="livesaving" style="display: none">Сохранение... <img class="ajaxload icon" src="<?= _IMGSRC ('loading-spinner.gif') ?>" alt="" /></span>
      <span id="livesave-button" class="keyboard-shortcut clickable-keyboard-shortcut" title="Несохранённые изменения" style="display: none"><?= _SHORTCUT ('livesave')? _SHORTCUT ('livesave') : 'Сохранить' ?></span>
      <span id="livesave-error" style="color: #f00; font-weight: bold; display: none; padding: 0 .33em">!</span><br />
    </p>
    </div>

    <textarea name="text"
      class="required"
      id="text"
      tabindex="2"
      style="width: 100%; height: 25.2em; overflow-x: hidden; overflow-y: visible"
    ><?=$content['form-note']['text']?></textarea>

    <div id="e2-uploaded-image-prototype" class="e2-uploaded-image" style="display: none">
      <div style="position: relative">
      <!--
        <div style="position: absolute; right: 0; top: 0">
        -->
          <a class="e2-uploaded-image-remover" href=""><img src="<?= _IMGSRC ('remove-pic.png') ?>" alt="Убрать"  /></a>
          <!--
        </div>
        -->
        <a class="e2-uploaded-image-preview" href="javascript:return(false)"><img src="" alt="" /></a>
      </div>
    </div>
    
    <div id="e2-uploaded-images">
    <? foreach ($content['form-note']['images'] as $image) { ?>
      <div class="e2-uploaded-image"><span class="e2-uploaded-image-preview"><img src="<?= $image['thumb'] ?>" alt="<?= $image['name'] ?>" /></span></div>
    <? } ?>
    </div>
    
    <div id="e2-upload-controls" class="e2-upload-controls admin-links" style="display: none"><a href="javascript:" id="e2-upload-button"><img src="<?= _IMGSRC ('attach.gif') ?>" alt="@" title="Добавить рисунок" align="middle" width="24" height="24" /></a><img class="ajaxload" id="e2-uploading" src="<?= _IMGSRC ('loading-spinner.gif') ?>" alt="" style="display: none" /><br /></div>

    <p id="e2-upload-error" class="small wrong" style="clear: left; display: none"></p>

    <div style="clear: left"></div>
    
  </div>
</div>

<div class="form-control">
  <div class="label input-label"><label>Теги через запятую</label></div>
  <input id="all-tags"
    type="hidden"
    value="<?= implode (',', $content['form-note']['all-tags']) ?>" />
  <input type="text"
    class="text width-4"
    autocomplete="off"
    tabindex="3"
    id="tags"
    name="tags"
    value="<?= $content['form-note']['tags'] ?>" /><br />
  <div class="admin-links" style="width: 100%; position: relative">
  <div id="tags-menu" class="tags e2-tag-list"></div>
  </div>

</div>

<!--
http://devthought.com/wp-content/projects/jquery/textboxlist/Demo/
-->

<div class="submit-box">
<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-note']['submit-text'] ?>"
  /><span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span><br />
</div>
</div>



<div class="form-control">
  <div class="form-control-sublabel">
  <p class="admin-links clear">
  <? if (array_key_exists ('edit-time-href', $content['form-note'])) { ?>
    <a href="<?=$content['form-note']['edit-time-href']?>">Изменение времени</a>
    &nbsp;&nbsp;&nbsp;
  <? } ?>
  <? if (array_key_exists ('delete-href', $content['form-note'])) { ?>
  <a href="<?=$content['form-note']['delete-href']?>" class="delete">Удаление</a>
  <? } ?>
  </p>
  </div>
</div>
<? if (@$content['form-note']['note']['published?']) { ?>
<? } ?>

</div>


</form>


