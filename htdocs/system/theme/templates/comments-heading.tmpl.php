<? if ($content['notes']['only']['comments-count']) { ?>

<h3 class="comments-heading">

<span id="e2-comments-count"><?= _NUM ($content['notes']['only']['comments-count'] .' ����������(�,�,��)') ?></span><? if ($content['notes']['only']['new-comments-count'] == 1 and $content['notes']['only']['comments-count'] == 1) { ?>, �����<? } elseif ($content['notes']['only']['new-comments-count'] == $content['notes']['only']['comments-count']) { ?>, �����<? } elseif ($content['notes']['only']['new-comments-count']) { ?><span class="admin-links">, ������� <a href="<?=$content['current-href']?>#new" class="dashed"><?= _NUM ($content['notes']['only']['new-comments-count'] .' ����(�,�,�)') ?></a></span><? } ?>

<? if (array_key_exists ('comments-rss-href', $content)): ?><a class="rss-link" href="<?=@$content['comments-rss-href']?>">���</a><? endif; ?>

</h3>

<? } ?>

