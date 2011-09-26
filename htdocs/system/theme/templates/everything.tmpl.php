<style>
.e2et { font-size: 60%; vertical-align: bottom; display: inline; display: inline-block; display: -moz-inline-box; width: 1em; text-align: right; margin-right: .5em; height: 10px }
.e2at { color: #6688cc; }
.e2gt { color: #ddd; }
.e2e { font-size: 1px; vertical-align: bottom; display: inline; display: inline-block; display: -moz-inline-box; width: 3px; height: 16px; margin-bottom: 2px; }
.e2n { background: #acbfe5; border-right: #dae2f2 1px solid; }
.e2nf { background: #339900; border-right: #e2f2da 1px solid; }
.e21p { height: 1px; }
.e22p { height: 2px; }
.e23p { height: 3px; }
.e24p { height: 4px; }
.e25p { height: 5px; }
.e26p { height: 6px; }
.e27p { height: 7px; }
.e28p { height: 8px; }
.e29p { height: 9px; }
.e210p { height: 10px; }
</style>



<? foreach ($content['everything'] as $year): ?>

<h3><a href="<?= $year['href'] ?>"><?= _DT ('Y', $year['start-time']) ?> год</a></h3>

<table cellpadding="4" cellspacing="0" border="0" width="100%" style="table-layout: fixed">
<tr valign="top">

  <? foreach ($year['months'] as $month): ?>

  <td><p><a href="<?= $month['href'] ?>""><?= substr (_DT ('{month}', $month['start-time']), 0, 3) ?></a></p>

    <? foreach ($month['days'] as $day): ?>
    
    <? if ($day['notes?']): ?>
    <a href="<?= $day['href'] ?>" class="e2et e2at"><?= _DT ('j', $day['start-time']) ?></a><?= $day['html'] ?><br />
    <? else: ?>
    <span class="e2et e2gt"><?= _DT ('j', $day['start-time']) ?></span><br />
    <? endif ?>
    
    <? endforeach ?>
    
  </td>
  
  <? endforeach ?>
  
</tr>
</table>

<? endforeach ?>
