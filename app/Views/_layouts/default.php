<?php
/**
 * @var Framework\MVC\View $view
 */
?>

<!doctype html>
<html class="antialiased scroll-smooth" lang="<?= App::language()->getCurrentLocale() ?>"
      dir="<?= App::language()->getCurrentLocaleDirection() ?>">
<head>
    <meta charset="utf-8">
    <title><?= isset($title) ? strip_tags($title) : 'Markt Club' ?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= asset('favicon.png') ?>"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="<?= asset('css/all.min.css') ?>" rel="stylesheet"/>

    <?= $view->renderBlock('header') ?>
</head>
<body class="bg-gray-200 text-gray-800">
<?= $view->renderBlock('contents') ?>
</body>

<script src="<?= asset('js/app.js') ?>"></script>
<?= $view->renderBlock('scripts') ?>
</html>
