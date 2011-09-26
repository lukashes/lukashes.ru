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
  ��������� ������� �������� � ��������� ������ ���� � ���������� �������.
</div>

<div class="form-control">
  <div class="form-subcontrol">
    <div class="label"><label>������� �&nbsp;���������</label></div>
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
    /> � ��������� �� ������ �����
    </label>
  </div>

</div>

<div class="form-control">
  <div class="form-control-sublabel">
  ��� ���������� ������� � ������� ���� ������ ������������ �������������. � ������ ������� ������������ <a href="<?= @$content['form-note-finetune']['default-timezone-href'] ?>">������� ���� �� ���������</a>.
  </div>
</div>


<div class="form-control">
  <div class="label"><label>����� ����������</label></div>
  <input type="radio" class="radio" name="stamp_radio" id="stamp_radio_shift" checked="checked" value="shift" />
  <label for="stamp_radio_shift" class="radio">�� ������</label><br />
  <input type="radio" class="radio" name="stamp_radio" id="stamp_radio_update" value="update" />
  <label for="stamp_radio_update" class="radio">�������� �� �������</label><br />
  <input type="radio" class="radio" name="stamp_radio" id="stamp_radio_new" value="new" />
  <label for="stamp_radio_new" class="radio">�������� ��:</label><br />
  <input type="text"
    class="text"
    name="stamp"
    id="stamp"
    value="<?= @$content['form-note-finetune']['stamp-formatted'] ?>"
    onfocus="document.getElementById ('stamp_radio_new').checked = 'checked'"
  />
</div>


<div class="form-control">
  <div class="label"><label>����� ������</label></div>
  <input type="radio" class="radio" name="lastmodified_radio" id="lastmodified_radio_shift" checked="checked" value="shift" />
  <label for="lastmodified_radio_shift" class="radio">�� ������</label><br />
  <input type="radio" class="radio" name="lastmodified_radio" id="lastmodified_radio_update" value="update" />
  <label for="lastmodified_radio_update" class="radio">�������� �� �������</label><br />
  <input type="radio" class="radio" name="lastmodified_radio" id="lastmodified_radio_new" value="new" />
  <label for="lastmodified_radio_new" class="radio">�������� ��:</label><br />
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
