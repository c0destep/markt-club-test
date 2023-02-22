<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Exception;
use Framework\Crypto\Password;
use Framework\Crypto\Utils;
use Framework\HTTP\Response;
use Framework\MVC\Controller;
use SodiumException;

class AuthController extends Controller
{
    /**
     * @var string
     */
    protected string $modelClass = UsersModel::class;

    /**
     * @return string
     */
    public function login(): string
    {
        return $this->render('auth/login', [
            'title' => 'Logar-se'
        ]);
    }

    /**
     * @return Response
     * @throws SodiumException
     *
     */
    public function identify(): Response
    {
        $errors = $this->validate($this->request->getPost(), [
            'cpf' => 'required|regex:/[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/',
            'password' => 'required|regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8\,64})/'
        ], [
            'cpf' => 'CPF',
            'password' => 'Senha'
        ]);

        if (count($errors) > 0) {
            foreach ($errors as $index => $error) {
                session()->setFlash($index, $error);
            }

            setFlashInfo('Verifique as inconsistências e tente novamente');
            return $this->response->redirect(route_url('auth.login'));
        }

        $user = $this->model->getUserByCpf(str_replace(['.', '-'], '', $this->request->getPost('cpf')));

        if (is_null($user)) {
            setFlashInfo('CPF e Senha incorretos');
            return $this->response->redirect(route_url('auth.login'));
        }

        if ($user->status === 0) {
            setFlashInfo('Usuário desativado');
            return $this->response->redirect(route_url('auth.login'));
        }

        if (!Password::verify($this->request->getPost('password'), $user->password)) {
            setFlashInfo('CPF e Senha incorretos');
            return $this->response->redirect(route_url('auth.login'));
        }

        try {
            session()->set('userIdentify', Utils::bin2base64($user->email));
            session()->regenerateId(true);
        } catch (SodiumException|Exception) {
            setFlashError('Um erro inexpeerado ocorreu');
            return $this->response->redirect(route_url('auth.login'));
        }

        return $this->response->redirect(route_url('users.index'));
    }

    /**
     * @return bool|object
     */
    public static function verify(): bool|object
    {
        if (!session()->has('userIdentify')) {
            return false;
        }

        try {
            $userEmail = Utils::base642bin(session()->get('userIdentify'));
        } catch (SodiumException) {
            return false;
        }

        $user = (new UsersModel())->getUserByEmail($userEmail);

        if (is_null($user)) {
            return false;
        }

        return $user;
    }

    /**
     * @return Response
     */
    public function logout(): Response
    {
        if (session()->isActive()) {
            session()->destroy();
            session()->destroyCookie();
        }
        return $this->response->redirect(route_url('auth.login'));
    }
}
