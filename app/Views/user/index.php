<?php
/**
 * @var Framework\MVC\View $view
 */
$request = App::request();
?>

<?php $view->extends('default') ?>

<?php $view->block('header') ?>
<?php $view->endBlock() ?>

<?php $view->block('contents') ?>
<main>
    <section class="relative">
        <div class="container px-4 mx-auto mt-8">
            <div class="flex justify-end items-center">
                <a href="<?= route_url('auth.logout') ?>"
                   class="inline-flex justify-center items-center text-red-500 font-semibold">
                    Sair
                </a>
            </div>
            <div>
                <?= getAllFlashes() ?>
                <form class="flex justify-between items-end mb-5" action="<?= current_url() ?>" method="get">
                    <div class="inline-flex items-end">
                        <div class="mr-2">
                            <label class="inline-block text-sm font-bold uppercase mb-2.5" for="name">
                                Nome
                            </label>
                            <input id="name" type="text" name="name"
                                   class="block px-4 py-2"
                                   placeholder="Pesquisar por nome"
                                   value="<?= $request->getGet('name') ?? '' ?>">
                        </div>
                        <button type="submit"
                                class="inline-flex justify-center items-center gap-x-2 bg-gray-800 border border-gray-800 text-white px-4 py-2">
                            Filtrar
                        </button>
                    </div>
                    <div>
                        <a href="<?= route_url('users.new') ?>"
                           class="inline-flex justify-center items-center gap-x-2 bg-orange-500 border border-orange-500 text-white px-4 py-2">
                            Novo usuário
                        </a>
                    </div>
                </form>
                <div class="bg-white border border-gray-900 overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                        <tr class="bg-gray-300 border-b border-b-gray-900 divide-x divide-gray-900 font-semibold text-left uppercase whitespace-nowrap">
                            <th class="px-3 py-1.5">
                                CPF
                            </th>
                            <th class="px-3 py-1.5">
                                Nome
                            </th>
                            <th class="px-3 py-1.5">
                                E-mail
                            </th>
                            <th class="px-3 py-1.5">
                                Permissões
                            </th>
                            <th class="px-3 py-1.5">
                                Status
                            </th>
                            <th class="px-3 py-1.5">
                                Registrado em
                            </th>
                            <th class="px-3 py-1.5">
                                Atualizado em
                            </th>
                            <th class="px-3 py-1.5">
                                Ações
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users ?? [] as $user): ?>
                            <tr class="border-b border-b-gray-900 divide-x divide-gray-900">
                                <td class="whitespace-nowrap px-3 py-1.5 ">
                                    <?= $user->cpf ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <?= $user->name ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <?= $user->email ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <?= $user->permissions ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <?php if ($user->status): ?>
                                        Ativo
                                    <?php else: ?>
                                        Desativado
                                    <?php endif; ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <?= $user->createdAt->format('d/m/Y H:i') ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <?= $user->updatedAt->format('d/m/Y H:i') ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-1.5">
                                    <div class="w-full flex items-center gap-x-2">
                                        <a class="inline-flex justify-center items-center bg-yellow-500 text-gray-900 px-4 py-2"
                                           href="<?= route_url('users.edit', [$user->id]) ?>">
                                            Editar
                                        </a>
                                        <a class="inline-flex justify-center items-center bg-red-700 text-white px-4 py-2"
                                           href="<?= route_url('users.remove', [$user->id]) ?>">
                                            Deletar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if (!empty($pager)): ?>
                    <?= $pager->render('tailwind-custom') ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php $view->endBlock() ?>

<?php $view->block('scripts') ?>
<?php $view->endBlock() ?>
