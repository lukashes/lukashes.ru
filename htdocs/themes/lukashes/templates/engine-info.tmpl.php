<div class="engine-info">
<?# ����������, �� �������� ��������� �������: #?>
<?=$content['engine']['about']?>

<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.1;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->


<? if ($content['sign-in']['done?']) { ?>
&nbsp;&nbsp;&nbsp;
<span title="����� ���������: <?=$content['engine']['pgt']?> c, <?=_NUM (($content['engine']['qc']). ' ������(�,��)')?>"><?=$content['engine']['pgt']?>&nbsp;�</span>
<? } ?>

</div>
