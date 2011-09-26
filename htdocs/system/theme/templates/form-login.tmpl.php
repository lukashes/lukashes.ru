<form
  action="<?= $content['form-login']['form-action'] ?>"
  method="post"
  class="form-login e2-enterable <? if (!$content['sign-in']['necessary?']) { ?>e2-hideable<? } ?>"
  id="form-login"
  <?= $content['sign-in']['necessary?']? '' : 'style="display: none"' ?>
>

<a id="e2-check-password-action" href="<?= $content['form-login']['form-check-password-action'] ?>"></a>
  
<? if ($content['sign-in']['necessary?']): ?>
<div class="sunglass">
</div>
<div class="sunglass-text">
	<? if (array_key_exists ('sign-in-prompt', $content)) { ?>
	<h1>&uarr;<br /><?= $content['sign-in-prompt'] ?></h1>
	<? } ?>
	<p><small><?= _A ('<a href="'. $content['blog']['href']. '">Главная страница</a>') ?></small></p>
</div>
<? endif ?>

<div id="e2-login-sheet"
  style="position: fixed; z-index: 999; left: 50%; top: 0; margin: 0 -150px; width: 300px;">

<div style="position: relative; width: 300px; background: url('<?= _IMGSRC ('guard-fill.png') ?>') left top repeat-y">

<input type="text" name="login" value="<?= $content['form-login']['login-name'] ?>" style="display: none" />

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size: 80%">

<tr height="10">
	<td width="40" rowspan="6">&nbsp;</td><td></td>
	<td width="10" rowspan="6">&nbsp;</td><td></td>
	<td width="80" rowspan="6">&nbsp;</td>
</tr>

<tr valign="middle">
	<td><img src="<?= _IMGSRC ('lock.gif') ?>" width="24" height="24" alt="Пароль" align="baseline" style="position: relative; top: 1px;" /></td>
	<td><input type="password" name="password" id="e2-password" class="input-disableable" style="width: 100%" /></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td>
		<label><input type="checkbox"
			class="checkbox input-disableable"
			name="is_public_pc"
			id="is_public_pc"
			<?= $content['form-login']['public-pc?']? ' checked="checked"' : '' ?>
		/>&nbsp;Чужой&nbsp;компьютер</label>
	</td>
</tr>

<tr height="10"></tr>

<tr>
	<td>&nbsp;</td>
	<td>
	  <input type="submit" value="Войти" valign="baseline"
	    class="input-disableable" style="width: 5em"
	  /><img id="password-checking" src="<?= _IMGSRC ('loading-spinner.gif') ?>" alt="" valign="baseline" 
	    class="ajaxload" style="display: none; margin-left: 1em"
	  /><img id="password-correct" src="<?= _IMGSRC ('tick.png') ?>" alt="" valign="baseline" 
	    style="display: none; margin-left: 1em; position: relative; top: 2px"
    />
	</td>
</tr>

</table>
</div>

<div style="position: relative; width: 300px; height: 50px; background: url('<?= _IMGSRC ('guard-bottom.png') ?>') left top no-repeat">
</div>

</div>

</form>