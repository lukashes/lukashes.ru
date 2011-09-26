<? foreach ($content['notes'] as $note): ?>

<? _X ('note-pre') ?>

<div class="<?= array_key_exists ('only', $content['notes'])? 'only ': '' ?>note">

<? if (@$note['published?']) { ?>

<p class="super-h" title="<?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>"><?= _AGO ($note['time']) ?></p>

<? } else { ?>

<? // � ���������� ����� ����-����� ��������/��������� // ?>
<p class="super-h" title="�������� ������: <?=_DT ('j {month-g} Y, H:i, {zone}', @$note['time'])?>, ������: <?=_DT ('j {month-g} Y, H:i, {zone}', @$note['last-modified'])?>"><?=_DT ('j {month-g} Y, H:i', @$note['time'])?>...<!--  <?=_DT ('j {month-g} Y, H:i', @$note['last-modified'])?>--></p>

<? } ?>

<? // ��������� ������� // ?>
<h1 class="<?= $note['published?']? 'published' : 'draft' ?> <?= $note['visible?']? 'visible' : 'hidden' ?> e2-smart-title"><?= _A ('<a href="'. $note['href']. '">'. $note['title']. '</a>') ?>

<span class="icons">

<? if (array_key_exists ('favourite-toggle-href', $note)): ?>
<a href="<?= $note['favourite-toggle-href'] ?>" class="e2-favourite-toggle">
<img src="<?= _IMGSRC ('star-'. ($note['favourite?']? 'set' : 'unset') .'.png') ?>" alt="���������" title="���������"
/></a>

<? else: ?>
<? if (@$note['favourite?']) { ?><img src="<?= _IMGSRC ('star.gif') ?>" alt="���������" /><? } ?> 
<? endif ?>

<? if (array_key_exists ('edit-href', $note)): ?>
<a href="<?= $note['edit-href'] ?>"><img src="<?= _IMGSRC ('edit.png') ?>" alt="�������" title="�������" /></a>
<? endif ?>

</span>

</h1>

<? // ����� ������� // ?>
<div class="text <?= $note['published?']? 'published' : 'draft' ?> <?= $note['visible?']? 'visible' : 'hidden' ?>">
<?=@$note['text']?>
</div>

<? // ������� ������ � ������ ��������� (���� ��� ����): // ?>

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
<a href="<?= $note['href'] ?>"><b><?= _NUM ($note['comments-count'] .' ����������(�,�,��)') ?></b></a><? if ($note['new-comments-count'] == 1 and $note['comments-count'] == 1) { ?>
, �����
<? } elseif ($note['new-comments-count'] == $note['comments-count']) { ?>
, �����
<? } elseif ($note['new-comments-count']) { ?>
<span class="admin-links">, ������� <a href="<?=$note['href']?>#new"><?= _NUM ($note['new-comments-count'] .' ����(�,�,�)') ?></a></span>
<? } ?>
<? } else { ?>
<a href="<?= $note['href'] ?>"><b>��� ������������</b></a>
<? } ?>
</div>
<? endif ?>

</div>

<? _X ('note-post') ?>

<? if (!_LAST ($note)): ?>
<div class="note-spacer"></div>
<? endif ?>

<? endforeach ?>
 