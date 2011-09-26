<p class="month-days">

<? foreach ($content['month-days'] as $day): ?>
<? if ($day['this?']): ?>
<span class="month-day current"><?= strtolower (_DT ('j', $day['start-time'])) ?></span>
<? elseif ($day['fruitful?']): ?>
<span class="month-day"><a href="<?= $day['href'] ?>"><?= strtolower (_DT ('j', $day['start-time'])) ?></a></span>
<? elseif ($day['real?']): ?>
<span class="month-day"><?= strtolower (_DT ('j', $day['start-time'])) ?></span>
<? else: ?>
<span class="month-day unexistent"><?= strtolower (_DT ('j', $day['start-time'])) ?></span>
<? endif; ?>

<? endforeach ?>

</p>