<div class="sidebar">

<div class="user-picture">
  <?= _A ('<a href="'. $content['blog']['href']. '"><img src="'. $content['blog']['userpic-href'] .'" alt="" /></a>') ?> 
  
</div>

<? _X ('sidebar-pre') ?>

<? _T_FOR ('tags-menu') ?>

<? _T_FOR ('favourites') ?>

<? _T_FOR ('most-commented') ?>

<h2>Поиск</h2>
<? _T_FOR ('form-search') ?>

<? _X ('sidebar-post') ?>

</div>
