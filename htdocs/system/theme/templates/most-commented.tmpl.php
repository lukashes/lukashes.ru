<?# ���� ���� ������, ������ ����� ������� #?>
<? if (array_key_exists ('each', $content['most-commented'])): ?> 

<? if (_AT ($content['most-commented']['href'])): ?>
<h2><?=$content['most-commented']['title']?> &rarr;</h2>
<? else: ?>
<h2><a href="<?= $content['most-commented']['href'] ?>"><?= $content['most-commented']['title'] ?></a></h2>
<? endif ?>

<ul class="links-list">
<? foreach ($content['most-commented']['each'] as $item) { ?>
<li>
<? if ($item['current?']) { ?>
<?= $item['title'] ?> &rarr;
<? } else { ?>
<a href="<?= $item['href'] ?>" title="<?=_DT ('j {month-g} Y, H:i', $item['time'])?>"><?= $item['title'] ?></a>
<? } ?>
</li>
<? } ?>
</ul>


<?# ����� ����� ������ �������� ������ #?>
<? else: ?>

<? if (_AT ($content['most-commented']['href'])): ?>
<p>����������� &rarr;</p>
<? else: ?>
<p><a href="<?= $content['most-commented']['href'] ?>">�����������</a></p>
<? endif ?>

<? endif ?>
