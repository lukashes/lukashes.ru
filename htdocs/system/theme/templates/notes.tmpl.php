<? foreach ($content['notes'] as $note): ?>

<? _X ('note-pre') ?>

<div class="<?= array_key_exists ('only', $content['notes'])? 'only ': '' ?>note">

<? if (@$note['published?']) { ?>

<p class="super-h" title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>"><?= _AGO ($note['time']) ?></p>

<? } else { ?>

<? // в черновиках пишем дату-время создания/изменения // ?>
<p class="super-h" title="Черновик создан: <?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>, изменён: <?=_DT ('j {month-g} Y, H:i, {zone}', @$note['last-modified'])?>"><?=_DT ('j {month-g} Y, H:i', @$note['time'])?>...<!--  <?=_DT ('j {month-g} Y, H:i', @$note['last-modified'])?>--></p>

<? } ?>

<? // заголовок заметки // ?>
<h1 class="<?= $note['published?']? 'published' : 'draft' ?> <?= $note['visible?']? 'visible' : 'hidden' ?> e2-smart-title"><?= _A ('<a href="'. $note['href']. '">'. $note['title']. '</a>') ?>

<span class="icons">

<? if (array_key_exists ('favourite-toggle-href', $note)): ?>
<a href="<?= $note['favourite-toggle-href'] ?>" class="e2-favourite-toggle">
<img src="<?= _IMGSRC ('star-'. ($note['favourite?']? 'set' : 'unset') .'.png') ?>" alt="Избранное" title="Избранное"
/></a>

<? else: ?>
<? if (@$note['favourite?']) { ?><img src="<?= _IMGSRC ('star.gif') ?>" alt="Избранное" /><? } ?> 
<? endif ?>

<? if (array_key_exists ('edit-href', $note)): ?>
<a href="<?= $note['edit-href'] ?>"><img src="<?= _IMGSRC ('edit.png') ?>" alt="Править" title="Править" /></a>
<? endif ?>

</span>

</h1>

<? // текст заметки // ?>
<div class="text <?= $note['published?']? 'published' : 'draft' ?> <?= $note['visible?']? 'visible' : 'hidden' ?>">
<?=@$note['text']?>
</div>

<? // выводим экшены и список кейвордов (если они есть): // ?>

<? if (array_key_exists ('tags', $note)): ?>
<div class="tags">
<!--<span title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>"><?= _AGO ($note['time']) ?></span> &nbsp;-->
<?
$tags = array ();
foreach ($note['tags'] as $tag) {
  if ($tag['current?']) {
    $tags[] = '<span class="e2-marked">'. $tag['name'] .'</span>';
  } else {
    $tags[] = '<a href="'. $tag['href'] .'">'. $tag['name'] .'</a>';
  }
}
echo implode (' &nbsp; ', $tags)

?>
</div>
<? endif; ?>


<? if ($note['comments-link?']): ?>
<div class="comments-link">
<img src="<?= _IMGSRC ('comments.gif') ?>" alt="" />
<? if ($note['comments-count']) { ?>
<a href="<?= $note['href'] ?>"><b><?= _NUM ($note['comments-count'] .' комментари(й,я,ев)') ?></b></a><? if ($note['new-comments-count'] == 1 and $note['comments-count'] == 1) { ?>
, новый
<? } elseif ($note['new-comments-count'] == $note['comments-count']) { ?>
, новые
<? } elseif ($note['new-comments-count']) { ?>
<span class="admin-links">, включая <a href="<?=$note['href']?>#new"><?= _NUM ($note['new-comments-count'] .' новы(й,х,х)') ?></a></span>
<? } ?>
<? } else { ?>
<a href="<?= $note['href'] ?>"><b>нет комментариев</b></a>
<? } ?>
</div>
<? endif ?>

</div>

<? _X ('note-post') ?>

<? if (!_LAST ($note)): ?>
<div class="note-spacer"></div>
<? endif ?>

<? endforeach ?>
 