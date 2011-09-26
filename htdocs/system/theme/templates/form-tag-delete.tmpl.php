<form
  action="<?= @$content['form-tag-delete']['form-action'] ?>"
  method="post"
>

<input
  type="hidden"
  name="tag-id"
  value="<?= @$content['form-tag-delete']['.tag-id'] ?>" 
/>


<div class="form">

<div class="delete-box">

<p>Тег «<?= $content['form-tag-delete']['tag']?>» будет удалён из заметок, но сами заметки останутся.</p>

<p></p>


<div>
  <input
    type="submit"
    id="submit-button"
    value="<?= @$content['form-tag-delete']['submit-text'] ?>"
  /><br />
</div>

</div>

</div>

</form>