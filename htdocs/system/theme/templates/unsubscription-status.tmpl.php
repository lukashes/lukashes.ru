<? if ($content['unsubscription-status']['success?']) { ?>

<h2>Получилось!</h2>
<p>Вы больше не подписаны на комментарии к заметке <a href="<?= $content['unsubscription-status']['note-href'] ?>"><?= $content['unsubscription-status']['note-title'] ?></a>.</p>

<? } else { ?>

<h2>Не получилось</h2>
<p><?= $content['unsubscription-status']['error-message'] ?></p>

<? } ?>
