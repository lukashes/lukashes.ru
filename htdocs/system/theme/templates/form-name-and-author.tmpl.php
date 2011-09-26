<? _JS ('form-name-and-author') ?>

<form
  action="<?= @$content['form-name-and-author']['form-action'] ?>"
  method="post"
>

<input
  type="hidden"
  id="blog-title-default"
  name="blog-title-default"
  value="<?= @$content['form-name-and-author']['blog-title-default'] ?>"
/>

<input
  type="hidden"
  id="blog-author-default"
  name="blog-author-default"
  value="<?= @$content['form-name-and-author']['blog-author-default'] ?>"
/>

<div class="form">

<?/*
<div class="form-control">
  <div class="label input-label"><label>Картинка</label></div>
  <div>
    <img src="< ?= $content['blog']['userpic-href'] ? >" alt="" />
  </div>
 
</div>
*/?>

<div class="form-control">
  <div class="label input-label"><label>Название блога</label></div>
  <input type="text"
    class="text big width-4"
    id="blog-title"
    name="blog-title"
		value="<?= $content['form-name-and-author']['blog-title'] ?>"
  />
</div>

<div class="form-control">
  <div class="label"><label>Коротко о&nbsp;блоге</label></div>
	<textarea
	  class="width-4"
		style="height: 6.66em; overflow-x: hidden; overflow-y: visible"
		id="blog-description"
		name="blog-description"
	><?= @$content['form-name-and-author']['blog-description'] ?></textarea>
</div>

<div class="form-control">
  <div class="form-subcontrol">
    <div class="label input-label"><label>Автор</label></div>
    <input type="text"
      class="text width-2"
      id="blog-author"
      name="blog-author"
      value="<?= $content['form-name-and-author']['blog-author'] ?>"
    />
  </div>
  <!--
  <div class="form-subcontrol">
    <div class="admin-links" style="width: 96px; height: 128px; border: 1px #d0d0d0 solid; text-align: center; font-size: 70%; padding-top: 3em">
    <a href="" class="dashed" id="upload-button">Загрузить фотографию...</a>
    </div>
  </div>
  -->
</div>

<div class="submit-box">
<div>
  <input
    type="submit"
    id="submit-button"
    tabindex="4"
    value="<?= @$content['form-name-and-author']['submit-text'] ?>"
  /><span class="keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span><br />
</div>
</div>


</div>

</form>