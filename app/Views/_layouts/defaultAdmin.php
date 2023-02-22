<?php
/**
 * @var Framework\MVC\View $view
 */
?>

<!doctype html>
<html class="antialiased scroll-smooth break-words selection:bg-indigo-500 selection:text-gray-100"
	  lang="<?= App::language()->getCurrentLocale() ?>"
	  dir="<?= App::language()->getCurrentLocaleDirection() ?>">
<head>
	<meta charset="utf-8">
	<title>
		<?= isset($title) ? strip_tags($title) . ' | ' . lang('base.administration') : lang('base.administration') ?>
	</title>

	<meta content="php, code, codestep, tailwindcss" name="keywords"/>
	<meta content="Codingstep Inc." name="description"/>
	<meta content="Open-source" name="subject"/>
	<meta content="Codestep" name="copyright"/>
	<meta content="<?= App::language()->getCurrentLocale() ?>" name="language"/>
	<meta content="index,follow" name="robots"/>
	<meta content="Codestep, codestep@codingstep.com.br" name="author"/>
	<meta content="<?= route_url('home.index') ?>" name="url"/>
	<meta content="width=device-width, initial-scale=1" name="viewport"/>

	<meta content="Codingstep" property="og:title"/>
	<meta content="website" property="og:type"/>
	<meta content="<?= route_url('home.index') ?>" property="og:url"/>
	<meta content="<?= asset('android-chrome-512x512.png') ?>" property="og:image"/>
	<meta content="Codingstep" name="og:site_name"/>
	<meta content="Codingstep Inc." name="og:description"/>

	<link rel="manifest" href="<?= asset('site.webmanifest') ?>"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?= asset('favicon.ico') ?>"/>
	<link rel="apple-touch-icon" sizes="180x180" href="<?= asset('apple-touch-icon.png') ?>"/>
	<link rel="icon" type="image/png" sizes="32x32" href="<?= asset('favicon-32x32.png') ?>"/>
	<link rel="icon" type="image/png" sizes="16x16" href="<?= asset('favicon-16x16.png') ?>"/>

	<link href="<?= asset('css/output.css') ?>" rel="stylesheet"/>
	<link href="<?= asset('css/all.min.css') ?>" rel="stylesheet"/>

	<?= $view->renderBlock('header') ?>
</head>
<body class="body__main">
<noscript>You need to enable JavaScript to run this app.</noscript>
<div>
	<?= $view->include('sidebar') ?>
	<main class="main__main">
		<?= $view->include('navbarAdmin') ?>
		<?= $view->renderBlock('contents') ?>
	</main>
</div>
</body>

<script src="<?= asset('js/app.js') ?>"></script>
<script src="<?= asset('js/chart.min.js') ?>"></script>
<script src="<?= asset('js/popper.min.js') ?>"></script>
<?= $view->renderBlock('scripts') ?>
</html>
