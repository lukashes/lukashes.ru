<form
  action="<?= $content['form-note-withdraw']['form-action'] ?>"
  method="post"
>

<input
  type="hidden"
  name="note-id"
  value="<?= $content['form-note-withdraw']['.note-id'] ?>" 
/>

<div class="form">

<p>Вы собираетесь отозвать заметку &laquo;<?= @$content['form-note-withdraw']['note-title'] ?>&raquo;.</p>

<p>Заметка будет преобразована в черновик. Черновики не отображаются в архиве и не занимают там адреса вида /год/месяц/день/номер. Это значит, что если в этот день были ещё заметки после данной, то их номера &laquo;съедут&raquo;, и возможные ссылки на них сломаются.</p>

<p>Если заметка устарела, и вы не хотите, чтобы её видели посетители, лучше просто скройте её.</p>

<p></p>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle">
<td width="50%">
  <p>
  <input type="submit" name="withdraw" value="Отозвать заметку" />
  <br />
  </p>
</td>
<td width="50%">
  <p>
  <input type="submit" name="hide" value="Просто скрыть заметку" />
  </p>
</td>
</tr>
</table>

</div>

</form>