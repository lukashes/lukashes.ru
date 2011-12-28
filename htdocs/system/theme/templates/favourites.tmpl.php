<?# если есть список, значит нужно вывести #?>
<? if (array_key_exists ('each', $content['favourites'])): ?> 

<? if (_AT ($content['favourites']['href'])): ?>
<h2><?=$content['favourites']['title']?> &rarr;</h2>
<? else: ?>
<h2><a href="<?= $content['favourites']['href'] ?>"><?=$content['favourites']['title']?></a></h2>
<? endif ?>

<ul class="links-list">
<? foreach ($content['favourites']['each'] as $item) { ?>
<li>
<? if ($item['current?']) { ?>
<?= $item['title'] ?> &rarr;
<? } else { ?>
<a href="<?= $item['href'] ?>" title="<?=_DT ('j {month-g} Y, H:i', $item['time'])?>"><?= $item['title'] ?></a>
<? } ?>
</li>
<? } ?>
</ul>


<?# иначе нужно просто показать ссылку #?>
<? else: ?>

<? if (_AT ($content['favourites']['href'])): ?>
<p>»збранное <img src="<?= _IMGSRC ('star-stroke.gif') ?>" class="icon" alt="" width="17" height="16" /> &rarr;</p>
<? else: ?>
<p><a href="<?= $content['favourites']['href'] ?>">»збранное</a> <img src="<?= _IMGSRC ('star-stroke.gif') ?>" class="icon" alt="" width="17" height="16" /></p>
<? endif ?>

<? endif ?>
