<div class="engine-info">
<?# ����������, �� �������� ��������� �������: #?>
<?=$content['engine']['about']?>

<? if ($content['sign-in']['done?']) { ?>
&nbsp;&nbsp;&nbsp;
<span title="����� ���������: <?=$content['engine']['pgt']?> c, <?=_NUM (($content['engine']['qc']). ' ������(�,��)')?>"><?=$content['engine']['pgt']?>&nbsp;�</span>
<? } ?>

</div>
