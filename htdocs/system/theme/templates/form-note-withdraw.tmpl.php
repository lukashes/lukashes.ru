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

<p>�� ����������� �������� ������� &laquo;<?= @$content['form-note-withdraw']['note-title'] ?>&raquo;.</p>

<p>������� ����� ������������� � ��������. ��������� �� ������������ � ������ � �� �������� ��� ������ ���� /���/�����/����/�����. ��� ������, ��� ���� � ���� ���� ���� ��� ������� ����� ������, �� �� ������ &laquo;������&raquo;, � ��������� ������ �� ��� ���������.</p>

<p>���� ������� ��������, � �� �� ������, ����� � ������ ����������, ����� ������ ������� �.</p>

<p></p>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="middle">
<td width="50%">
  <p>
  <input type="submit" name="withdraw" value="�������� �������" />
  <br />
  </p>
</td>
<td width="50%">
  <p>
  <input type="submit" name="hide" value="������ ������ �������" />
  </p>
</td>
</tr>
</table>

</div>

</form>