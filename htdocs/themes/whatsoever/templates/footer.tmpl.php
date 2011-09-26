<div class="bottom-line"></div>

<? _X ('footer-pre') ?>

<? _T_FOR ('form-search') ?>

<div class="visual-login">
<? if (!$content['sign-in']['done?'] and !$content['sign-in']['necessary?']) { ?>
<a id="e2-visual-login" href="<?= $content['hrefs']['sign-in'] ?>"><img src="<?= _IMGSRC ('login.png') ?>" class="icon" alt="¬ход под паролем" width="16" height="16" /></a>
<? } ?>
</div>

<? _T ('copyrights') ?>

<? _T ('engine-info') ?>

<? _X ('footer-post') ?>

<div class="bottom-spacer"></div>
