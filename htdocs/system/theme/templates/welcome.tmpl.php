<? if ($content['sign-in']['done?']): ?>

<div class="center">
  <p>��� ����� ��������� ������ ������� ����� ����,<br />��� �� �������� ���-������:</p>
  
  <p><img src="<?= _IMGSRC ('screenshot.jpg') ?>" alt="��������" width="552" height="542" style="margin: 0 -20px" /></p>
</div>

<? else: ?>

<div class="center">
  <img src="<?= _IMGSRC ('nothing.png')?>" alt="" width="300" height="300" />
</div>

<? endif ?>