<meta http-equiv="Content-Type" content="text/html; charset=<?= $content['output-charset'] ?>" />

<base href="<?= $content['base-href'] ?>" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

<? foreach ($content['stylesheets'] as $stylesheet): ?>
<link rel="stylesheet" type="text/css" href="<?= $stylesheet ?>" />
<? endforeach ?>

<? foreach ($content['newsfeeds'] as $newsfeed): ?>
<link rel="alternate" type="application/rss+xml" title="<?= $newsfeed['title'] ?>" href="<?= $newsfeed['href'] ?>" />
<? endforeach ?>

<link rel="e2-theme-image" id="e2-i-loading-spinner" href="<?= _IMGSRC ('loading-spinner.gif') ?>" />
<link rel="e2-theme-image" id="e2-i-loading-bar" href="<?= _IMGSRC ('loading-bar.gif') ?>" />
<link rel="e2-theme-image" id="e2-i-mark-hgl-left" href="<?= _IMGSRC ('hgl-left.png') ?>" />
<link rel="e2-theme-image" id="e2-i-mark-hgl-right" href="<?= _IMGSRC ('hgl-right.png') ?>" />
<link rel="e2-theme-image" id="e2-i-mark-hgl-bg" href="<?= _IMGSRC ('hgl-bg.png') ?>" />

<? if ($content['sign-in']['done?']) { ?>
<link rel="e2-theme-image" id="e2-i-pinned" href="<?= _IMGSRC ('pinned.gif') ?>" />
<link rel="e2-theme-image" id="e2-i-pin" href="<?= _IMGSRC ('pin.gif') ?>" />
<link rel="e2-theme-image" id="e2-i-star-set" href="<?= _IMGSRC ('star-set.png') ?>" />
<link rel="e2-theme-image" id="e2-i-star-unset" href="<?= _IMGSRC ('star-unset.png') ?>" />
<link rel="e2-theme-image" id="e2-i-remove" href="<?= _IMGSRC ('remove.png') ?>" />
<link rel="e2-theme-image" id="e2-i-marker" href="<?= _IMGSRC ('marker.png') ?>" />
<link rel="e2-theme-image" id="e2-i-marker-remove" href="<?= _IMGSRC ('marker-remove.png') ?>" />
<? } ?>

<? foreach ($content['navigation-links'] as $link): ?>
<link rel="<?= $link['rel'] ?>" id="<?= $link['id'] ?>" href="<?= $link['href'] ?>" />
<? endforeach ?>

<? foreach ($content['scripts'] as $script): ?>
<script type="text/javascript" src="<?= $script ?>"></script>
<? endforeach ?>

<? _T ('head-extras') ?>

<? if (array_key_exists ('robots', $content)): ?>
<meta name="robots" content="<?= $content['robots'] ?>" />
<? endif ?>

<title><?= $content['title'] ?></title>