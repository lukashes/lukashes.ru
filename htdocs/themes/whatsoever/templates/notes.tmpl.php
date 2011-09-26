<? foreach ($content['notes'] as $note): ?>

<div class="<?= array_key_exists ('only', $content['notes'])? 'only ': '' ?>note">



<? // заголовок заметки // ?>
<h1 class="<?= $note['published?']? 'published' : 'draft' ?> <?= $note['visible?']? 'visible' : 'hidden' ?>"><span class="h1"><?= _A ('<a href="'. $note['href']. '">'. $note['title']. '</a>') ?></span>

<span class="post-h1-icons">

<? if (array_key_exists ('favourite-toggle-href', $note)): ?>

<a href="<?= $note['favourite-toggle-href'] ?>" class="e2-favourite-toggle">
<img src="<?= _IMGSRC ('star-'. ($note['favourite?']? 'set' : 'unset') .'.png') ?>" align="bottom" title="Добавить в Избранное"
/></a>
  
<? else: ?>
<? if (@$note['favourite?']) { ?>
<img src="<?= _IMGSRC ('star.gif') ?>" align="bottom" alt="Избранное" />
<? } ?> 
<? endif ?>

<? if (array_key_exists ('edit-href', $note)): ?>
<a href="<?= $note['edit-href'] ?>"><img src="<?= _IMGSRC ('edit.png') ?>" align="bottom" alt="Править" /></a>
<? endif ?>

<? if (array_key_exists ('delete-href', $note)): ?>
<a href="<?= $note['delete-href'] ?>"><img src="<?= _IMGSRC ('remove.png') ?>" alt="Убрать" style="margin: -2px -1px -1px" /></a>
<? endif ?>

</span>

<? if (@$note['published?']) { ?>

<span class="h-date" title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>"><?= _AGO ($note['time']) ?></span>

<? } else { ?>

<? // в черновиках пишем дату-время создания/изменения // ?>
<span class="h-date" title="Черновик создан: <?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>, изменён: <?=_DT ('j {month-g} Y, H:i, {zone}', @$note['last-modified'])?>"><?=_DT ('j {month-g} Y, H:i', @$note['time'])?> ... <?=_DT ('j {month-g} Y, H:i', @$note['last-modified'])?></span>

<? } ?>

</h1>

<? // текст заметки // ?>
<div class="text <?= $note['published?']? 'published' : 'draft' ?> <?= $note['visible?']? 'visible' : 'hidden' ?>">
<?=@$note['text']?>
</div>

<? // выводим экшены и список кейвордов (если они есть): // ?>

<? if (array_key_exists ('tags', $note)): ?>
<div class="tags">
<?
$tags = array ();
foreach ($note['tags'] as $tag) {
  if ($tag['current?']) {
    $tags[] = '<span class="e2-highlight">'. $tag['name'] .'</span>';
  } else {
    $tags[] = '<a href="'. $tag['href'] .'">'. $tag['name'] .'</a>';
  }
}
echo implode (' &nbsp; ', $tags)

?>
</div>
<? endif; ?>


<? if (count ($note['actions']['ahrefs']) > 0): ?>
<div class="meta"><span class="admin-links"><?= @implode (' &nbsp;&nbsp; ', $note['actions']['ahrefs']) ?></span></div>
<? endif; ?>

<? if ($note['comments-link?']): ?>
<div class="comments-link">

<img src="<?= _IMGSRC ('comments.gif') ?>" alt="" />
<a href="<?= $note['href'] ?>"><?=(@$note['comments-count'] > 0) ? _NUM ($note['comments-count'] .' комментари(й,я,ев)') : 'нет комментариев'?></a><?=(@$note['new-comments-count'] > 0) ? ('<i>, включая '. _NUM ($note['new-comments-count'] .' новы(й,х,х)') .'</i>') : ''?>

<!--
<a href="<?= $note['href'] ?>"><img src="images/comments.gif" alt="" /><?=(@$note['comments-count'] > 0) ? $note['comments-count'] : '' ?></a>
-->
</div>
<? endif ?>

</div>

<? if (!_LAST ($note)): ?>
<div class="note-spacer"></div>
<? endif ?>

<? endforeach ?>

<? if (@$content['no-notes-text']) { ?> 
<p><?=@$content['no-notes-text']?></p>
<? } ?>