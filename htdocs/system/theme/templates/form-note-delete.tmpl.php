<form
  action="<?= @$content['form-note-delete']['form-action'] ?>"
  method="post"
>

<input
  type="hidden"
  name="note-id"
  value="<?= @$content['form-note-delete']['.note-id'] ?>" 
/>

<input
  type="hidden"
  name="is-draft"
  value="<?= @$content['form-note-delete']['.is-draft'] ?>" 
/>

<div class="form">

<div class="delete-box">

<? if ($content['form-note-delete']['draft?']) { ?>
<p>�������� �<?= $content['form-note-delete']['note-title']?>� ����� �����.</p>
<? } else { ?>
<p>������� �<?= $content['form-note-delete']['note-title']?>� ����� ������� ������ �� ����� �������������.</p>
<? } ?>

<p></p>

<div>
  <input
    type="submit"
    id="submit-button"
    value="<?= @$content['form-note-delete']['submit-text'] ?>"
  /><br />
</div>

<script type="text/javascript"> document.getElementById ('submit-button').focus () </script>

</div>

</div>

</form>