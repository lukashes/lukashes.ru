<div class="sidebar">

<? _X ('sidebar-pre') ?>

<div class="sidebar-element">
<? _T_FOR ('tags-menu') ?>
</div>

<div class="sidebar-element">
<? _T_FOR ('favourites') ?>
</div>

<div class="sidebar-element">
<? _T_FOR ('most-commented') ?>
</div>

<? _X ('sidebar-post') ?>

<? if ($content['sign-in']['done?']) { ?>
<div class="sidebar-element">
<p class="help"><a href="http://blogengine.ru/help/extras/" target="_blank">Как изменить эту колонку?</a>&nbsp;<img width="10" height="8" src="<?= _IMGSRC ('blank-window.gif') ?>" alt="" /></p>
</div>
<? } ?>

</div>
