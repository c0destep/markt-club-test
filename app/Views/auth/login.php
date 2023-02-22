<?php
/**
 * @var Framework\MVC\View $view
 */
?>

<?php $view->extends('defaultForm') ?>

<?php $view->block('form') ?>
<div class="w-full px-4 md:w-5/12 lg:w-4/12 xl:w-3/12">
    <h1 class="text-6xl font-bold text-orange-600 text-center mb-8">
        Markt Club
    </h1>
    <div class="relative w-full flex flex-col bg-gray-50 rounded-xl shadow-lg mb-6">
        <div class="px-4 pt-6 pb-4 lg:px-8 lg:pt-12">
            <?= getAllFlashes() ?>
            <hr class="border-gray-300 mt-6"/>
        </div>
        <div class="px-4 pb-6 lg:px-8 lg:pb-12">
            <div class="text-xl font-bold text-gray-500 text-center mb-6 lg:text-2xl">
                <p>
                    <?= lang('base.access_the_system') ?>
                </p>
            </div>
            <form id="formSignIn" action="<?= route_url('auth.identify') ?>" method="post">
                <?= csrf_input() ?>
                <div class="w-full mb-4">
                    <label class="inline-block text-xs font-bold text-gray-700 uppercase mb-2.5 lg:text-sm" for="cpf">
                        <?= lang('base.cpf') ?>
                    </label>
                    <input id="cpf" type="text" name="cpf"
                           placeholder="<?= lang('base.cpf') ?>"
                           pattern="[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}"
                           value="<?= old('cpf') ?>" required
                           class="w-full block bg-gray-200 border border-gray-300 focus:border-transparent rounded-xl text-sm text-gray-700 placeholder-gray-400 outline-none transition-all ease-in-out px-3 py-2.5 focus:ring focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-gray-50 lg:text-base lg:px-6 lg:py-4"/>
                    <?php if (!is_null(session()->getFlash('cpf'))): ?>
                        <p class="text-sm font-medium text-red-400 mt-1 lg:text-base lg:mt-1.5">
                            <?= session()->getFlash('cpf') ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="w-full mb-6">
                    <label class="inline-block text-xs font-bold text-gray-700 uppercase mb-2.5 lg:text-sm"
                           for="password">
                        <?= lang('base.password') ?>
                    </label>
                    <input id="password" type="password" name="password"
                           placeholder="***********"
                           pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,64})" required autocomplete="off"
                           title="<?= lang('base.password_strong') ?>"
                           class="w-full block bg-gray-200 border border-gray-300 focus:border-transparent rounded-xl text-sm text-gray-700 placeholder-gray-400 outline-none transition-all ease-in-out px-3 py-2.5 focus:ring focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-gray-50 lg:text-base lg:px-6 lg:py-4"/>
                    <?php if (!is_null(session()->getFlash('password'))): ?>
                        <p class="text-sm font-medium text-red-400 mt-1 lg:text-base lg:mt-1.5">
                            <?= session()->getFlash('password') ?>
                        </p>
                    <?php endif; ?>
                </div>
                <button
                    class="w-full inline-flex justify-center items-center bg-orange-600 border border-orange-600 rounded-xl shadow text-sm font-bold text-gray-100 uppercase outline-none transition-all ease-in-out px-6 py-3 lg:text-base"
                    type="submit">
                    <?= lang('base.sign_in') ?>
                </button>
            </form>
        </div>
    </div>
</div>
<?php $view->endBlock() ?>

<?php $view->block('scripts') ?>
<?php $view->endBlock() ?>
