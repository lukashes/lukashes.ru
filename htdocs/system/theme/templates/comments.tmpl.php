<div class="comments">

<? if (array_key_exists ('comments', $content)) { ?>

<? if (!array_key_exists ('only', $content['comments'])) { ?>
<? _T ('comments-heading'); ?>
<? } ?>

<? // сами комментарии // ?>
<? foreach ($content['comments'] as $comment): ?>


<? if ($comment['first-new?']) { ?><a name="new"></a><? } ?>
      
<div class="comment-and-reply">

<div class="<?= $comment['spam-suspect?']? 'spam' : '' ?> <?= $comment['visible?']? 'visible' : 'hidden' ?>">

  <div class="comment e2-comment-control-group">
    
    <div class="comment-meta-area">
      <div>
      
      <span
        class="comment-author"
        title="<?= _DT ('j {month-g} Y, H:i, {zone}', $comment['time']) ?>"
      >
      <span class="e2-markable <? if (@$comment['important?']) echo 'e2-marked' ?>"><?= @$comment['name'] ?></span>
      </span>
      
    
      <span class="icons e2-comment-actions">
        <? if (array_key_exists ('important-toggle-href', $comment)): ?><a href="<?= $comment['important-toggle-href'] ?>" class="e2-important-toggle"><img src="<?= _IMGSRC ('marker'.(@$comment['important?']?'-remove':'').'.png') ?>" width="16" height="16" alt="Важный" title="Важный" /></a><? endif ?>
      </span>
      
      </div>
      
      <div class="meta" style="display: none">
      <span class="admin-links">
  
      <? if (array_key_exists ('ip-href', $comment)): ?><a href="<?=$comment['ip-href']?>"><?=$comment['ip']?></a><? endif; ?>
  
      </span>
      </div>
      
    </div>
  
    <div class="comment-content-area">
  
      <div class="comment-actions-removed admin-links" style="display: none">
  
      <? if (array_key_exists ('removed-toggle-href', $comment)): ?>
      <a href="<?= $comment['removed-toggle-href'] ?>" class="e2-removed-toggle dashed"><small>Вернуть</small></a>
      <? endif; ?>
      
      </div>
      
      <div class="comment-content <?= $comment['visible?']? 'visible' : 'hidden' ?>">
      <?=@$comment['text']?>
    
      <span class="icons">
        <? if ($comment['visible?'] and !$comment['replying?'] and array_key_exists ('reply-href', $comment)): ?><a href="<?= $comment['reply-href'] ?>"><img src="<?= _IMGSRC ('reply.gif') ?>" width="16" height="16" alt="Ответить" title="Ответить" /></a><? endif; ?><? if (array_key_exists ('email', $comment)): ?><a href="mailto:<?=@$comment['email']?>"><img src="<?= _IMGSRC ('email'. ((@$comment['subscriber?'])? '-subscribed' : '') .'.png')?>" width="16" height="16" alt="Эл. почта" title="Эл. почта <?=  (@$comment['subscriber?'])? '(подписан на комментарии)' : '' ?>"></a><? endif; ?>
      </span>
      
      </div>
        
    </div>

    <? if (array_key_exists ('edit-href', $comment) or array_key_exists ('removed-toggle-href', $comment)): ?>
    <div class="comment-control-area">
      <span class="icons comment-secondary-controls e2-comment-actions">
        <? if (array_key_exists ('edit-href', $comment)): ?><a href="<?= $comment['edit-href'] ?>"><img src="<?= _IMGSRC ('edit-small.png') ?>" width="16" height="16" alt="Править" title="Править" /></a><? endif ?><? if (array_key_exists ('removed-toggle-href', $comment)): ?><a href="<?= $comment['removed-toggle-href'] ?>" class="e2-removed-toggle nu"><img src="<?= _IMGSRC ('remove.png') ?>" alt="Убрать" title="Убрать" /></a><? endif ?>
      </span>
      <img class="e2-removed-toggling" src="<?= _IMGSRC ('loading-spinner.gif') ?>" alt="" style="display: none" />
    </div>
    <? endif ?>
  
    <div class="clear"></div>
  
  </div>

  <? if (@$content['form'] != 'form-comment-reply' and $comment['replied?']) { ?>

  <div class="comment e2-comment-control-group reply <?#= $comment['reply-visible?']? 'visible' : 'hidden' ?>">

    <div class="comment-meta-area">
      <div>
    
      <span
        class="comment-author"
        title="<?= _DT ('j {month-g} Y, H:i, {zone}', @$comment['reply-time']) ?>"
      >
        <span class="e2-markable <? if (@$comment['reply-important?']) echo 'e2-marked' ?>"><?= @$comment['author-name'] ?></span>
      </span>
  
      <span class="icons e2-comment-actions" style="margin-right: 16px">
        <? if (array_key_exists ('reply-important-toggle-href', $comment)): ?><a href="<?= $comment['reply-important-toggle-href'] ?>" class="e2-important-toggle"><img src="<?= _IMGSRC ('marker'.(@$comment['reply-important?']?'-remove':'').'.png') ?>" width="16" height="16" alt="Важный" /></a><? endif ?>
      </span>
      
      </div>
    
    </div>
  
     
    <div class="comment-content-area">
  
      <img class="tail" src="<?= _IMGSRC ('tail.png')?>" alt="" />
      
      <div class="comment-actions-removed admin-links" style="display: none">
  
      <? if (array_key_exists ('removed-reply-toggle-href', $comment)): ?>
      <a href="<?= $comment['removed-reply-toggle-href'] ?>" class="e2-removed-toggle dashed"><small>Вернуть</small></a>
      <? endif; ?>
      
      </div>
      
      <div class="comment-content" <?= $comment['reply-visible?']? '' : 'style="display: none"' ?>>
        <div>
        <?=@$comment['reply']?>
        </div>
    
      </div>
  
    </div>
  
    <? if (array_key_exists ('edit-reply-href', $comment) or array_key_exists ('removed-reply-toggle-href', $comment)): ?>
    <div class="comment-control-area">
      <span class="icons comment-secondary-controls e2-comment-actions">
        <? if (array_key_exists ('edit-reply-href', $comment)): ?><a href="<?= $comment['edit-reply-href'] ?>"><img src="<?= _IMGSRC ('edit-small.png') ?>" alt="Править" /></a><? endif; ?><? if (array_key_exists ('removed-reply-toggle-href', $comment)): ?><a href="<?= $comment['removed-reply-toggle-href'] ?>" class="e2-removed-toggle nu"><img src="<?= _IMGSRC ('remove.png') ?>" alt="Убрать" /></a><? endif; ?>
      </span>
      <span class="icons"><img class="e2-removed-toggling" src="<?= _IMGSRC ('loading-spinner.gif') ?>" alt="" style="display: none" /></span>
    </div>
    <? endif ?>
  
  
    <div class="clear"></div>

  </div>
  
  <? } ?>
    
</div>

</div>

<? endforeach ?>



<!--
<a href="<?=$content['comments-delete-spam-href']?>">Удалить спам</a>
-->

<? } ?>


<? if (array_key_exists ('notes', $content)) { ?>
<? if (array_key_exists ('only', $content['notes'])) { ?>
<? if ($content['notes']['only']['can-be-commentable?']) { ?>

<? if ($content['notes']['only']['commentable-now?']) { ?>

  <h3>Ваш комментарий</h3>

  <div class="humble-form">
  <? _T_FOR ('form-comment') ?>
  </div>
  

<? } else { ?>

  <p><img src="<?= _IMGSRC ('no-comments.gif') ?>" alt="Без комментариев" /></p>

<? } ?>

<? } ?>
<? } ?>
<? } ?>



</div>


<? // ссылка на закрытие/открытие комментирования заметки // ?>
<? if (array_key_exists ('comments-toggle', $content)) { ?>
<p>
<a href="<?=$content['comments-toggle']['href']?>">
<input
  type="button"
  value="<?= $content['comments-toggle']['text'] ?>"
/>
</a>
</p>
<? } ?>



