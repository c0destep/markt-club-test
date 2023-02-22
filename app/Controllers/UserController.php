<?php

namespace App\Controllers;

use App\Entity\UserEntity;
use App\Models\UsersModel;
use Framework\Crypto\Password;
use Framework\HTTP\Response;
use Framework\MVC\App;
use Framework\MVC\Controller;

class UserController extends Controller
{
    /**
     * @var string
     */
    protected string $modelClass = UsersModel::class;

    /**
     * @return string
     */
    public function index(): string
    {
        $name = $this->request->getGet('name');
        $page = empty($this->request->getGet('page')) ? null : (int)$this->request->getGet('page');
        $perPage = empty($this->request->getGet('perPage')) ? null : (int)$this->request->getGet('perPage');

        $users = $this->model->getUsers($name, $page, $perPage);

        $pager = $this->model->getPager();
        $pager->setView('tailwind-custom', APP_DIR . 'Views/pager.php');

        return $this->render('user/index', [
            'title' => 'Usuários',
            'users' => $users,
            'pager' => $pager
        ]);
    }

    /**
     * @return string
     */
    public function new(): string
    {
        return $this->render('user/new');
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        $errors = $this->validate($this->request->getPost(), [
            'cpf' => 'optional|regex:/[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/',
            'name' => 'optional|regex:/^((\b[A-zÀ-ú]{3\,50}\b)\s*){2\,}$/',
            'email' => 'optional|email',
            'password' => 'required|regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8\,64})/',
            'permissions' => 'optional|array'
        ], [
            'cpf' => 'CPF',
            'name' => 'Nome',
            'email' => 'E-mail',
            'permissions' => 'Permissões'
        ]);

        if (count($errors) > 0) {
            foreach ($errors as $index => $error) {
                session()->setFlash($index, $error);
            }

            setFlashInfo('Verifique as inconsistências e tente novamente');
            return $this->response->redirect(route_url('users.new'));
        }

        $cpf = str_replace(['.', '-'], '', $this->request->getPost('cpf'));

        if (is_object($this->model->getUserByCPF($cpf))) {
            setFlashInfo('CPF já esta registrado');
            return $this->response->redirect(route_url('users.new'), $this->request->getPost());
        }

        if (is_object($this->model->getUserByEmail($this->request->getPost('email')))) {
            setFlashInfo('E-mail já esta em uso');
            return $this->response->redirect(route_url('users.new'), $this->request->getPost());
        }

        $userId = $this->model->create(new UserEntity([
            'cpf' => $cpf,
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'plaintextPassword' => $this->request->getPost('password'),
            'permissions' => json_encode($this->request->getPost('permissions'), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK),
            'status' => 1
        ]));

        if ($userId === false) {
            setFlashError('Um erro inexperado ocorreu');
            return $this->response->redirect(route_url('users.new'), $this->request->getPost());
        }

        setFlashSuccess('Usuário registrado com sucesso');
        return $this->response->redirect(route_url('users.index'));
    }

    /**
     * @param int $identify
     * @return Response
     */
    public function update(int $identify): Response
    {
        $errors = $this->validate($this->request->getPost(), [
            'cpf' => 'optional|regex:/[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/',
            'name' => 'optional|regex:/^((\b[A-zÀ-ú]{3\,50}\b)\s*){2\,}$/',
            'email' => 'optional|email',
            'permissions' => 'optional|array'
        ], [
            'cpf' => 'CPF',
            'name' => 'Nome',
            'email' => 'E-mail',
            'permissions' => 'Permissões'
        ]);

        if (count($errors) > 0) {
            foreach ($errors as $index => $error) {
                session()->setFlash($index, $error);
            }

            setFlashInfo('Verifique as inconsistências e tente novamente');
            return $this->response->redirect(route_url('users.edit', [$identify]));
        }

        if (is_null($this->model->find($identify))) {
            setFlashWarning('Um erro inexperado ocorreu');
            return $this->response->redirect(route_url('users.edit', [$identify]));
        }

        $cpf = str_replace(['.', '-'], '', $this->request->getPost('cpf'));
        $email = $this->request->getPost('email');
        $user = $this->model->getUserByCPF($cpf);

        if (is_object($user) && ($user->id !== $identify)) {
            setFlashInfo('CPF já esta registrado');
            return $this->response->redirect(route_url('users.edit'), $this->request->getPost());
        }

        if (is_object($this->model->getUserByEmail($email)) && ($user->email !== $email)) {
            setFlashInfo('E-mail já esta em uso');
            return $this->response->redirect(route_url('users.edit'), $this->request->getPost());
        }

        $data = [];

        foreach ($this->request->getPost() as $input => $value) {
            if (in_array($input, ['cpf', 'name', 'email']) && !empty($value)) {
                $data[$input] = $value;
            }

            if (($input === 'password') && !empty($value)) {
                $data['password'] = Password::hash($value);
            }

            if (($input === 'permissions') && !empty($value)) {
                $data['permissions'] = json_encode($value);
            }
        }

        $userSaved = $this->model->update($user->id, $data);

        if ($userSaved === false) {
            setFlashWarning('Um erro inexperado ocorreu');
            return $this->response->redirect(route_url('users.edit', [$identify]));
        }

        setFlashSuccess('Usuário atualizado com sucesso');
        return $this->response->redirect(route_url('users.index'));
    }

    /**
     * @param int $identify
     * @return string|Response
     */
    public function edit(int $identify): string|Response
    {
        $user = $this->model->find($identify);

        if (is_null($user)) {
            return $this->response->redirect(route_url('users.index'));
        }

        return $this->render('user/edit', [
            'user' => $user
        ]);
    }

    /**
     * @param int $identify
     * @return Response
     */
    public function remove(int $identify): Response
    {
        $user = $this->model->find($identify);

        if (!is_null($user)) {
            $this->model->delete($user->id);
        }

        return $this->response->redirect(route_url('users.index'));
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return Response|null
     */
    protected function beforeAction(string $method, array $arguments): ?Response
    {
        if (AuthController::verify() === false) {
            setFlashInfo('Você precisa estar logado para realizar está ação');
            return $this->response->redirect(route_url('auth.login'));
        }
        if ($this->request->isPost() && !App::antiCsrf()->verify()) {
            setFlashError('Houve uma anomalia na solicitação');
            return $this->response->redirect(route_url('auth.login'));
        }
        return null;
    }
}
