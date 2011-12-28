<?

$larr = $rarr = '';

if ($content['pages']['prev-href']) {
	$prev_link = str_replace ('<a>', '<a href="'. $content['pages']['prev-href'] .'">', $content['pages']['prev-title']);
	if ($content['pages']['prev-jump?']) $prev_link = $prev_link .'&nbsp;&nbsp;.&nbsp;.&nbsp;.';
	$larr = '&larr;&nbsp;';
} else {
	$prev_link = '<span class="grey">'. strip_tags ($content['pages']['prev-title']) .'</span>';
	$larr = '<span class="grey">&larr;&nbsp;</span>';
}

if ($content['pages']['next-href']) {
	$next_link = str_replace ('<a>', '<a href="'. $content['pages']['next-href'] .'">', $content['pages']['next-title']);
	if ($content['pages']['next-jump?']) $next_link = '.&nbsp;.&nbsp;.&nbsp;&nbsp;'. $next_link;
	$rarr = '&nbsp;&rarr;';
} else {
	$next_link = '<span class="grey">'. strip_tags ($content['pages']['next-title']) .'</span>';
	$rarr = '<span class="grey">&nbsp;&rarr;</span>';
}

?>

<? if (!array_key_exists ('count', $content['pages']) or ($content['pages']['count']) > 1): ?>
<div class="pages">

<? if ($content['pages']['prev-title'] or $content['pages']['next-title']): ?>
<div class="pages-prev-next">
<table cellspacing="0" cellpadding="0" border="0">
<tr valign="top">
<td><?= $content['pages']['title'] ?></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><?= $larr ?></td>
<td><?= $prev_link ?></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><span class="keyboard-shortcut"><?= _SHORTCUT ('navigation') ?></span></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><?= $next_link ?></td>
<td><?= $rarr ?></td>
</tr>
</table>
</div>
<? endif ?>

<? if ($content['pages']['each']): ?>
<div class="pages-each">
<? foreach ($content['pages']['each'] as $page => $href): ?>
<? if ($page == $content['pages']['this']): ?>
<b><?= $page ?></b>
<? else: ?>
<a href="<?= $href ?>"><?= $page ?></a>
<? endif ?>
<? endforeach ?>
</div>
<? endif ?>
<!--
-->

</div>
<? endif ?>
