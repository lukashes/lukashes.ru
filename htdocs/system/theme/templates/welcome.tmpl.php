<? if ($content['sign-in']['done?']): ?>

<div class="center">
  <p>Так будет выглядеть движок изнутри после того,<br />как вы напишете что-нибудь:</p>
  
  <p><img src="<?= _IMGSRC ('screenshot.jpg') ?>" alt="Скриншот" width="552" height="542" style="margin: 0 -20px" /></p>
</div>

<? else: ?>

<div class="center">
  <img src="<?= _IMGSRC ('nothing.png')?>" alt="" width="300" height="300" />
</div>

<? endif ?>