<? if ($content['pages']['numbered?'] and $content['pages']['this'] > 1) _T_FOR ('pages') ?>

<? _T_FOR ('unsubscription-status') ?>
<? _T_FOR ('system-items') ?>
<? _T_FOR ('files') ?>
<? _T_FOR ('notes') ?>
<? _T_FOR ('drafts') ?>
<? _T_FOR ('notes-list') ?>
<? _T_FOR ('pages') ?>
<? _T_FOR ('tags') ?>
<? _T_FOR ('sessions') ?>
<? _T_FOR ('update-page') ?>

<? _T ('comments') ?>

<? if (@$content['no-notes-text']) { ?> 
<p><?=@$content['no-notes-text']?></p>
<? } ?>

<?
  if ($content['class'] == 'frontpage' and $content['blog']['virgin?']) {
	  _T ('welcome');
	}
?>

<? if (array_key_exists ('form', $content)) { ?>
<?= _T_FOR ($content['form']) ?>
<? } ?>  

<? _T_FOR ('not-commentable') ?>
