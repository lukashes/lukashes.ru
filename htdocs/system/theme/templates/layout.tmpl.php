<? _T ('author-menu') ?>

<? _T ('header') ?>

<div class="top-line"></div>

<? _T_FOR ('message') ?>

<? if ($content['content-page?'] and !$content['blog']['virgin?']) _T ('sidebar') ?>

<div class="main-content">

<? if (array_key_exists ('superheading', $content)): ?>
<div class="super-h"><?= $content['superheading'] ?></div>
<? endif ?>

<? if (array_key_exists ('heading', $content)): ?>
<h2 id="e2-page-heading">

  <?= $content['heading'] ?>
  <? if (array_key_exists ('related-edit-href', $content)): ?>
  <a href="<?= $content['related-edit-href'] ?>"><img src="<?= _IMGSRC ('edit.png') ?>" align="bottom" alt="<?= $content['related-edit-title'] ?>" title="<?= $content['related-edit-title'] ?>" /></a>
  <? endif ?>
  <? if (array_key_exists ('related-rss-href', $content)): ?>
  <a class="rss-link" href="<?=$content['related-rss-href']?>">РСС</a>
  <? endif ?>

</h2>
<? endif ?>

<? if (array_key_exists ('search-related-tag', $content)) { ?> 
<p class="tags"><small>См. также тег <a href="<?=$content['search-related-tag']['href']?>"><?=$content['search-related-tag']['name']?></a>.</small></p>
<? } ?>

<? _T_FOR ('tag') ?>
<? _T_FOR ('error-404-description') ?>

<?# if (!$content['frontpage?'] or $content['pages']['numbered'] and $content['pages']['this'] > 1) _T_FOR ('pages') ?>

<? _T_FOR ('year-months') ?>
<? _T_FOR ('month-days') ?>

<? _T ('content') ?>

</div>

<div class="clear"></div>

<? _T ('footer') ?>
