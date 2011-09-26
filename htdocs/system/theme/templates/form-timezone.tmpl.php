<form
  action="<?= @$content['form-timezone']['form-action'] ?>"
  method="post"
>            

<div class="form">

<div class="form-control">
  <div class="form-control-sublabel">
    <p>Эгея хранит часовой пояс отдельно для каждой заметки.</p>
    
    <p>При публикации часовой пояс обычно определяется автоматически. А в случае неудачи используется выбранный здесь часовой пояс.</p>
  </div>
</div>

<div class="form-control">
  <div class="form-subcontrol">
    <div class="label"><label>Разница с&nbsp;Гринвичем</label></div>
    <?= $content['form-timezone']['timezone-selector'] ?>
  </div>
  
  <div class="form-subcontrol">
    <label class="checkbox">
    <input type="checkbox"
      name="is_dst" 
      <?= @$content['form-timezone']['dst?']? ' checked="checked"' : '' ?>
    /> с переходом на летнее время</label><br />
  </div>
  
</div>


<div>
  <input
    type="submit"
    id="submit-button"
    value="<?= @$content['form-timezone']['submit-text'] ?>"
  />
</div>

</div>




</form>
