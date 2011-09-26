<?= _CSS ('calendar') ?>

<table cellspacing="0" class="calendar">

<tr class="day-names">
  <? foreach (array ('пн', 'вт', 'ср', 'чт', 'пт') as $k) { ?><td><?= $k ?></td><? } ?>
  <? foreach (array ('сб', 'вс') as $k) { ?><td class="weekend"><?= $k ?></td><? } ?>
</tr>

<tr class="days">

<?
  $skip_days = gmdate ('w', gmmktime (0, 0, 0, $content['month'], 1, $content['year']));
  if ($skip_days == 0) $skip_days = 7;
  for ($i = 1; $i < $skip_days; $i ++) echo '<td></td>';
?>

<? foreach ($content['month-days'] as $day): ?>


<td>
<? if ($day['this?']): ?>
<div class="highlit"><?= $day['number'] ?></div>
<? elseif ($day['fruitful?']): ?>
<a href="<?= $day['href'] ?>"><?= $day['number'] ?></a>
<? elseif ($day['real?']): ?>
<div><?= $day['number'] ?></div>
<? else: ?>
<div class="unexistent"><?= $day['number'] ?></div>
<? endif; ?>
</td>


<? if ((($day['number']-1)%7)-7 == -$skip_days) { ?>
</tr>

<tr class="days">
<? } ?>

<? endforeach ?>

</tr>

</table>