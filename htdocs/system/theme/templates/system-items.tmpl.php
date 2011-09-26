<!--
<h3>Настройка</h3>

<table>

<tr valign="middle">
  <td width="64">
  <a href="<?=$content['system-items']['user']['href']?>"><img src="<?=$content['system-items']['user']['icon']?>" alt="" align="middle" /></a>
  </td>
  <td class="admin-links">
  <a href="<?=$content['system-items']['user']['href']?>"><?=$content['system-items']['user']['caption']?></a><br />
  <? if ($content['system-items']['user']['comment']) { ?><small><?=$content['system-items']['user']['comment']?></small><br /><? } ?>
  </td>

  <td width="64">
  <a href="<?=$content['system-items']['preferences']['href']?>"><img src="<?=$content['system-items']['preferences']['icon']?>" alt="" align="middle" /></a>
  </td>
  <td class="admin-links">
  <a href="<?=$content['system-items']['preferences']['href']?>"><?=$content['system-items']['preferences']['caption']?></a><br />
  <? if ($content['system-items']['preferences']['comment']) { ?><small><?=$content['system-items']['preferences']['comment']?></small><br /><? } ?>
  </td>
</tr>

<tr valign="middle">
  <td colspan="2"><br /></td>
</tr>

<tr valign="middle">
  <td width="64">
  <a href="<?=$content['system-items']['preferences']['href']?>"><img src="<?=$content['system-items']['aaaaaaa']['icon']?>" alt="" align="middle" /></a>
  </td>
  <td class="admin-links">
  <a href="<?=$content['system-items']['aaaaaaa']['href']?>"><?=$content['system-items']['aaaaaaa']['caption']?></a><br />
  <? if ($content['system-items']['aaaaaaa']['comment']) { ?><small><?=$content['system-items']['aaaaaaa']['comment']?></small><br /><? } ?>
  </td>

  <td width="64">
  <a href="<?=$content['system-items']['aaaaaaa']['href']?>"><img src="<?=$content['system-items']['aaaaaaa']['icon']?>" alt="" align="middle" /></a>
  </td>
  <td class="admin-links">
  <a href="<?=$content['system-items']['aaaaaaa']['href']?>"><?=$content['system-items']['aaaaaaa']['caption']?></a><br />
  <? if ($content['system-items']['aaaaaaa']['comment']) { ?><small><?=$content['system-items']['aaaaaaa']['comment']?></small><br /><? } ?>
  </td>
</tr>

</table>
-->
<!--
<table>
<? foreach ($content['system-items'] as $item): ?>

<tr valign="middle">
<td width="64">
<a href="<?=$item['href']?>"><img src="<?=$item['icon']?>" alt="" align="middle" /></a>
</td>
<td class="admin-links">
<a href="<?=$item['href']?>"><?=$item['caption']?></a><br />
<? if ($item['comment']) { ?><small><?=$item['comment']?></small><br /><? } ?>
</td>
</tr>
<tr valign="middle">
<td colspan="2"><br /></td>
</tr>

<? endforeach; ?>
</table>-->

<div style="float: left">

<? foreach ($content['system-items'] as $item): ?>

<div style="width: 10em; float: left; height: 6.67em; text-align: left" class="admin-links">
  <a href="<?=$item['href']?>" class="nu">
    <img src="<?=$item['icon']?>" alt="" align="middle" width="48" height="48" style="margin-bottom: .33em" /><br />
    <u><?=$item['caption']?></u><br />
  </a>
  <? if ($item['comment']) { ?><small><?=$item['comment']?></small><br /><? } ?>
</div>

<? endforeach; ?>


</div>

<div style="clear: left"></div>
