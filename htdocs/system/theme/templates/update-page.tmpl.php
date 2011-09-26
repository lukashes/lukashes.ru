<?= _JS ('update-page') ?>

<p>У вас установлена <?= $content['engine']['version-description'] ?>.</p>

<noscript>
<p>Для проверки обновления необходимо включить Джаваскрипт.</p>
</noscript>

<a id="e2-check-updates-action" href="<?= $content['update-page']['check-updates-action'] ?>"></a>
<a id="e2-describe-updates-action" href="<?= $content['update-page']['describe-updates-action'] ?>"></a>

<p id="e2-update-status" style="display: none">Проверка обновлений... <img class="ajaxload icon" src="<?= _IMGSRC ('loading-spinner.gif') ?>" alt="" /></p>

<p id="e2-update-description" style="display: none" class="external-html"></p>

<div id="e2-update-apply" style="display: none">
  <p id="e2-update-apply-text">Загрузка обновления — на сайте <a href="<?= $content['engine']['href'] ?>">движка</a>.</p>
</div>