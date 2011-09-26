<div class="form-search">

<? if (!array_key_exists ('form', $content)) { ?>

<form
  id="e2-form-search"
  class="e2-enterable"
  action="<?= @$content['form-search']['form-action'] ?>"
  method="post"
>

<div>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
		<td align="right"><img class="loupe" src="<?= _IMGSRC ('search.gif') ?>" alt="Поиск"
		  width="16" height="16" align="absmiddle"
		  onclick="with (document.getElementById ('query')) { focus (); select () }"
    /></td>
		<td width="100%">
		<input
		  style="width: 100%" type="search" class="text" name="query" id="query"
		  value="<?= @$content['form-search']['query'] ?>"
		/>
		</td>
		<td><input class="enter" type="image" src="<?= _IMGSRC ('enter.gif') ?>" align="absmiddle" width="16" height="16" alt="Найти" /></td>
	</tr>
	</table>
</div>

</form>

<p>&nbsp;</p>

<? } ?>

</div>
