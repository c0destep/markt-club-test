<?php
/**
 * @var Framework\MVC\View $view
 */
?>

<?php $view->extends('default') ?>

<?php $view->block('header') ?>
<?php $view->endBlock() ?>

<?php $view->block('contents') ?>
<main>
    <section class="relative">
        <div class="container px-4 mx-auto mt-8">
            <?= getAllFlashes() ?>
            <form class="bg-white rounded-xl shadow px-4 py-6"
                  action="<?= route_url('users.update', [$user->id ?? 0]) ?>"
                  method="post">
                <?= csrf_input() ?>
                <div class="p-4">
                    <h2 class="text-3xl font-bold mb-8">
                        Editar usuário
                    </h2>
                    <div class="w-full flex flex-wrap items-center">
                        <div class="w-full px-4 mb-4 md:w-1/2">
                            <label class="inline-block font-bold text-gray-700 uppercase mb-2.5" for="cpf">
                                CPF
                            </label>
                            <input id="cpf" type="text" name="cpf" class="w-full block" placeholder="CPF"
                                   value="<?= $user->cpf ?? old('cpf') ?>">
                            <?php if (!is_null(session()->getFlash('cpf'))): ?>
                                <p class="text-sm font-medium text-red-400 mt-1">
                                    <?= session()->getFlash('cpf') ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="w-full px-4 mb-4 md:w-1/2">
                            <label class="inline-block font-bold text-gray-700 uppercase mb-2.5" for="name">
                                Nome
                            </label>
                            <input id="name" type="text" name="name" class="w-full block"
                                   placeholder="Nome" value="<?= $user->name ?? old('name') ?>">
                            <?php if (!is_null(session()->getFlash('name'))): ?>
                                <p class="text-sm font-medium text-red-400 mt-1">
                                    <?= session()->getFlash('name') ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="w-full px-4 mb-4 md:w-1/2">
                            <label class="inline-block font-bold text-gray-700 uppercase mb-2.5" for="email">
                                E-mail
                            </label>
                            <input id="email" type="email" name="email" class="w-full block" placeholder="E-mail"
                                   value="<?= $user->email ?? old('email') ?>">
                            <?php if (!is_null(session()->getFlash('email'))): ?>
                                <p class="text-sm font-medium text-red-400 mt-1">
                                    <?= session()->getFlash('email') ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="w-full px-4 mb-4 md:w-1/2">
                            <label class="inline-block font-bold text-gray-700 uppercase mb-2.5" for="password">
                                Senha
                            </label>
                            <input id="password" type="password" name="password" class="w-full block"
                                   placeholder="Senha">
                            <?php if (!is_null(session()->getFlash('password'))): ?>
                                <p class="text-sm font-medium text-red-400 mt-1">
                                    <?= session()->getFlash('password') ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="w-full px-4 mb-4">
                            <label class="block font-bold text-gray-700 uppercase mb-2.5" for="permissions">
                                Permissões
                            </label>
                            <div class="flex gap-x-3">
                                <label class="inline-flex items-center">
                                    <input id="permissions" type="radio" value="admin"
                                           name="permissions[]" <?= (json_decode($user->permissions)[0] === 'admin') ? 'checked' : '' ?>>
                                    <span class="ml-2">Administrador</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input id="permissions" type="radio" value="editor"
                                           name="permissions[]" <?= (json_decode($user->permissions)[0] === 'editor') ? 'checked' : '' ?>>
                                    <span class="ml-2">Editor</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input id="permissions" type="radio" value="default"
                                           name="permissions[]" <?= (json_decode($user->permissions)[0] === 'default') ? 'checked' : '' ?>>
                                    <span class="ml-2">Padrão</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex px-4 gap-x-2">
                        <a class="inline-flex justify-center items-center bg-gray-800 text-white px-4 py-2"
                           href="<?= route_url('users.index') ?>">
                            Voltar
                        </a>
                        <button type="submit"
                                class="inline-flex justify-center items-center bg-orange-500 text-gray-900 px-4 py-2">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<?php $view->endBlock() ?>

<?php $view->block('scripts') ?>
<?php $view->endBlock() ?>
