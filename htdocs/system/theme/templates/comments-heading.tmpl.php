<? if ($content['notes']['only']['comments-count']) { ?>

<h3 class="comments-heading">

<span id="e2-comments-count"><?= _NUM ($content['notes']['only']['comments-count'] .' комментари(й,я,ев)') ?></span><? if ($content['notes']['only']['new-comments-count'] == 1 and $content['notes']['only']['comments-count'] == 1) { ?>, новый<? } elseif ($content['notes']['only']['new-comments-count'] == $content['notes']['only']['comments-count']) { ?>, новые<? } elseif ($content['notes']['only']['new-comments-count']) { ?><span class="admin-links">, включая <a href="<?=$content['current-href']?>#new" class="dashed"><?= _NUM ($content['notes']['only']['new-comments-count'] .' новы(й,х,х)') ?></a></span><? } ?>

<? if (array_key_exists ('comments-rss-href', $content)): ?><a class="rss-link" href="<?=@$content['comments-rss-href']?>">РСС</a><? endif; ?>

</h3>

<? } ?>

