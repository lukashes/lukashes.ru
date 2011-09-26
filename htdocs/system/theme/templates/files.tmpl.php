<script src="system/renamefile.js"></script>
<script src="system/js/jquery.js"></script>
<script src="system/js/tablesorter.jquery.js"></script>
<script src="system/js/e2-files.jquery.js"></script>

<style>
th.e2-header-sortable a { cursor: pointer; cursor: hand }
th.e2-header-sorted-up *,
th.e2-header-sorted-down * {
  font-weight: bold; 
  color: #000;
  border-bottom-color: #000;
}
.e2-table-row:hover,
.e2-table-row:hover .e2-balls {
  background: #fff8d4;
}
.e2-balls {
  display: none;
  position: absolute;
  right: 0;
  padding: 0 .33em 0 3.33em;
  
}
.e2-table-row:hover .e2-balls {
  display: block;
}

</style>

<? if (count ($content['files']['each'])): ?>

<table class="files admin-links" id="e2-files" cellspacing="0">

<thead>
<tr valign="baseline">
  <th align="left">Файл</th>
  <th align="right">Размер</th>
  <th align="left">Загружен</th>
<tr>
</thead>

<tbody>
<? foreach ($content['files']['each'] as $file): ?>
<tr valign="baseline" class="e2-table-row">
  <td value="<?= $file['name'] ?>"><span class="relative"><div class="e2-balls">&nbsp;</div></span><a href="<?= $file['href'] ?>"><?= $file['name'] ?></a><span class="file-extension <?= $file['extension'] ?>"><?= $file['dot-extension']?></span></td>
  <td value="<?= $file['size'] ?>" align="right"><?= _SIZE ($file['size'], _SIZE_KB) ?> <span class="small-caps">КБ</span></td>
  <td value="<?= $file['time-sort-value'] ?>"><?= _AGO ($file['time']) ?></td>
<tr>
<? endforeach ?>

</tbody>

</table>

<p></p>

<p><small>
  <i><?= _NUM (count ($content['files']['each']) .' файл(а,ов)') ?>,
  <?= _SIZE ($content['files']['total-size']) ?> 
  <span class="small-caps"><?= _SIZE (_SIZE_UNIT) ?></span></i>
</small></p>

<p></p>

<? else: ?>

<p>Файлов нет.</p>

<? endif ?>
