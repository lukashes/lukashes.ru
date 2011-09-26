<div class="top-spacer"></div>

<? _X ('header-pre') ?>

<div class="user-picture">
  <?= _A ('<a href="'. $content['blog']['href']. '"><img src="'. $content['blog']['userpic-href'] .'" alt="" /></a>') ?> 
  
</div>

<? _T_FOR ('form-search') ?>

<div class="blog-title-and-description">

  <h1>
    <?= _A ('<a href="'. $content['blog']['href']. '">'. $content['blog']['live-title']. '</a>') ?> 
    <?
      if (
        array_key_exists ('admin-hrefs', $content)
        and array_key_exists ('name-and-author', $content['admin-hrefs'])
        and !_AT ($content['admin-hrefs']['name-and-author'] )
      ) { 
    ?>
      <a href="<?= $content['admin-hrefs']['name-and-author'] ?>"><img src="<?= _IMGSRC ('edit.png') ?>" alt="Править" title="Править" /></a>
    <? } ?>
    <a class="rss-link" style="" href="<?=@$content['blog']['rss-href']?>">РСС</a>
  </h1>

  <p><?= $content['blog']['live-description'] ?></p>

</div>

<div class="clear"></div>

<? _X ('header-post') ?>
