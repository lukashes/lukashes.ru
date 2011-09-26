<? if ($content['tags-menu']['not-empty?']) { ?> 

<? if (_AT ($content['hrefs']['tags'])): ?> 
<h2>Теги &rarr;</h2>
<? else: ?>
<h2><a href="<?= $content['hrefs']['tags'] ?>">Теги</a></h2>
<? endif ?>

<ul class="links-list">
<? foreach ($content['tags-menu']['each'] as $tag): ?>
<? if ($tag['current?']) { ?>
<li>
  <?=$tag['tag']?>
  <? if ($tag['pinnable?']) { ?>
  <span class="icons"><a href="<?=$tag['pinned-toggle-href']?>" class="e2-pinned-toggle"><? if ($tag['pinned?']) { ?><img src="<?= _IMGSRC ('pinned.gif') ?>" width="16" height="16" alt="Закреплён" title="Закреплён. Щёлкните, чтобы открепить" style="margin: -2px" /><? } else { ?><img src="<?= _IMGSRC ('pin.gif') ?>" width="16" height="16" alt="Не закреплён" title="Не закреплён. Щёлкните, чтобы закрепить" style="margin: -2px" /></span><? } ?></a>
  <? } ?>
  &rarr;
</li>
<div style="clear: left"></div>
<? } else { ?>
<li><a href="<?=@$tag['href']?>"><?=@$tag['tag']?></a></li>
<? } ?>
<? endforeach ?>
</ul>

<? } else { ?>

<? if (_AT ($content['hrefs']['tags'])): ?> 
<p>Теги &rarr;</p>
<? else: ?>
<p><a href="<?= $content['hrefs']['tags'] ?>">Теги</a></p>
<? endif ?>

<? } ?>