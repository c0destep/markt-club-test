<?php
/*
 * This file is part of Aplus Framework Pagination Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var Framework\Pagination\Pager $pager
 */

$language = $pager->getLanguage();
$hasFirst = $pager->getCurrentPage() - $pager->getSurround() > 1;
$hasLast = $pager->getLastPage() && $pager->getCurrentPage() + $pager->getSurround() < $pager->getLastPage();
$hasPrev = $pager->getPreviousPage();

$query = App::request()->getUrl()->getQuery(['name', 'page', 'perPage']) ?? '';
?>
<div class="mt-5">
    <nav class="flex justify-center lg:justify-end">
        <?php if ($hasFirst) : ?>
            <a class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 active:bg-gray-700 border border-gray-700 hover:border-gray-600 active:border-gray-600 text-sm font-semibold p-2 lg:text-base"
               href="<?= $pager->getFirstPageUrl() . $query ?>">
                <?= $language->render('base', 'first') ?>
            </a>
        <?php endif ?>

        <?php if ($hasPrev) : ?>
            <a class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 active:bg-gray-700 border border-gray-700 hover:border-gray-600 active:border-gray-600 text-sm font-semibold p-2 lg:text-base <?= $hasFirst ? 'yes' : 'no' ?>"
               href="<?= $pager->getPreviousPageUrl() . $query ?>"
               title="<?= $pager->getLanguage()->render('base', 'previous') ?>">
                <span class="sr-only">
                    <?= $pager->getLanguage()->render('base', 'previous') ?>
                </span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        <?php endif ?>

        <?php foreach ($pager->getPreviousPagesUrls() as $p => $url) : ?>
            <a class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 active:bg-gray-700 border border-gray-700 hover:border-gray-600 active:border-gray-600 text-sm font-semibold px-4 py-2 lg:text-base"
               href="<?= $url . $query ?>">
                <?= $p ?>
            </a>
        <?php endforeach ?>

        <a class="inline-flex justify-center items-center bg-orange-600 hover:bg-orange-500 active:bg-orange-500 border border-orange-700 hover:border-orange-600 active:border-orange-600 text-sm font-bold text-orange-100 hover:text-orange-50 active:text-orange-50 px-4 py-2 lg:text-base <?= $hasPrev ? 'yes' : 'no' ?>"
           href="<?= $pager->getCurrentPageUrl() . $query ?>" rel="canonical" aria-current="page">
            <?= $pager->getCurrentPage() ?>
        </a>

        <?php foreach ($pager->getNextPagesUrls() as $p => $url) : ?>
            <a class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 active:bg-gray-700 border border-gray-700 hover:border-gray-600 active:border-gray-600 text-sm font-semibold px-4 py-2 lg:text-base"
               href="<?= $url . $query ?>">
                <?= $p ?>
            </a>
        <?php endforeach ?>

        <?php if ($pager->getNextPage() && $pager->getNextPage() < $pager->getLastPage() + 1) : ?>
            <a class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 active:bg-gray-700 border border-gray-700 hover:border-gray-600 active:border-gray-600 text-sm font-semibold p-2 lg:text-base <?= $hasLast ? 'yes' : 'no' ?>"
               href="<?= $pager->getNextPageUrl() . $query ?>"
               title="<?= $pager->getLanguage()->render('base', 'next') ?>">
                <span class="sr-only">
                    <?= $pager->getLanguage()->render('base', 'next') ?>
                </span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        <?php endif ?>

        <?php if ($hasLast) : ?>
            <a class="inline-flex justify-center items-center bg-gray-800 hover:bg-gray-700 active:bg-gray-700 border border-gray-700 hover:border-gray-600 active:border-gray-600 text-sm font-semibold p-2 lg:text-base"
               href="<?= $pager->getLastPageUrl() . $query ?>">
                <?= $language->render('base', 'last') ?>
            </a>
        <?php endif ?>
    </nav>
</div>

