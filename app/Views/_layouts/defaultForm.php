<?php
/**
 * @var Framework\MVC\View $view
 */
?>

<?php $view->extends('default') ?>

<?php $view->block('contents') ?>
<main>
    <section class="w-full h-screen">
        <div class="h-full grid grid-cols-1 place-content-center place-items-center">
            <?= $view->renderBlock('form') ?>
        </div>
    </section>
</main>
<?php $view->endBlock() ?>
