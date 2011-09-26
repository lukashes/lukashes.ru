<div class="engine-info">
<?# пожалуйста, не убирайте следующую строчку: #?>
<?=$content['engine']['about']?>

<? if ($content['sign-in']['done?']) { ?>
&nbsp;&nbsp;&nbsp;
<span title="Время генерации: <?=$content['engine']['pgt']?> c, <?=_NUM (($content['engine']['qc']). ' запрос(а,ов)')?>"><?=$content['engine']['pgt']?>&nbsp;с</span>
<? } ?>

</div>
