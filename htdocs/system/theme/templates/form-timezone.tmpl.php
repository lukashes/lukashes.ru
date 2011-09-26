<form
  action="<?= @$content['form-timezone']['form-action'] ?>"
  method="post"
>            

<div class="form">

<div class="form-control">
  <div class="form-control-sublabel">
    <p>���� ������ ������� ���� �������� ��� ������ �������.</p>
    
    <p>��� ���������� ������� ���� ������ ������������ �������������. � � ������ ������� ������������ ��������� ����� ������� ����.</p>
  </div>
</div>

<div class="form-control">
  <div class="form-subcontrol">
    <div class="label"><label>������� �&nbsp;���������</label></div>
    <?= $content['form-timezone']['timezone-selector'] ?>
  </div>
  
  <div class="form-subcontrol">
    <label class="checkbox">
    <input type="checkbox"
      name="is_dst" 
      <?= @$content['form-timezone']['dst?']? ' checked="checked"' : '' ?>
    /> � ��������� �� ������ �����</label><br />
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
