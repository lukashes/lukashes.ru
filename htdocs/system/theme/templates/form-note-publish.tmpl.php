<div style="height: 1.4em"></div>

<form
  action="<?= @$content['form-note-publish']['form-action'] ?>"
  method="post"
>

<input
  type="hidden"
  name="note-id"
  value="<?= @$content['form-note-publish']['.note-id'] ?>" 
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

<div class="form">

<div>
  <input
    type="submit"
    id="submit-button"
    value="<?= @$content['form-note-publish']['submit-text'] ?>"
  /><br />
</div>

</div>


</form>