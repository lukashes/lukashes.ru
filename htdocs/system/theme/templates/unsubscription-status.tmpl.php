<? if ($content['unsubscription-status']['success?']) { ?>

<h2>����������!</h2>
<p>�� ������ �� ��������� �� ����������� � ������� <a href="<?= $content['unsubscription-status']['note-href'] ?>"><?= $content['unsubscription-status']['note-title'] ?></a>.</p>

<? } else { ?>

<h2>�� ����������</h2>
<p><?= $content['unsubscription-status']['error-message'] ?></p>

<? } ?>
