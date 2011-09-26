<? if ($content['tags']['many?']) { ?>

<? _JS ('tags') ?>

<?/* js uses
    #e2-tag-slide Ч for the shaft
    #e2-tag-slider Ч†for the lift
*/?>

<div id="e2-tag-filter" class="tags-filter" style="display: none">
важные<span id="e2-tag-slide-area" class="tags-filter-slide-area"><span id="e2-tag-slide" class="tags-filter-slide">
  <div class="tags-filter-slide-shaft"></div>
  <div id="e2-tag-slider" class="tags-filter-slider"><img src="<?= _IMGSRC('slider-ball.png') ?>" alt="" width="16" height="16" /></div>
</span></span>все
</div>

<? } ?>

<?/* js uses
    .e2-tag-weight-X Ч for tags with specific weight
*/?>

<div class="tags">
<? foreach ($content['tags']['each'] as $tag): ?>
<span class="tag e2-tag-weight-<?= 1 + (int) ($tag['weight'] * 99)?>">
<a
  href="<?=@$tag['href']?>"
  style="color: #<?=_COLOR ('e0e0f0', '009', $tag['weight'], 0.8) ?>"
  <?# 567 ?>
  <? if ($tag['weight'] == 0): ?> class="tag-never-used" <? endif ?>
><?=@$tag['tag']?></a>
</span>
<? endforeach ?>
</div>
