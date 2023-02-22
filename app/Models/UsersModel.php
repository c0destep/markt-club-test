<?php

namespace App\Models;

use App\Entity\UserEntity;
use Framework\MVC\Model;
use Framework\Pagination\Pager;

class UsersModel extends Model
{
    protected string $table = 'users';
    protected string $returnType = UserEntity::class;
    protected array $allowedFields = [
        'cpf', 'name',
        'email', 'password',
        'permissions', 'status'
    ];
    protected bool $autoTimestamps = true;
    protected array $validationRules = [
        'cpf' => 'required|regex:/[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/',
        'name' => 'required|regex:/^((\b[A-zÀ-ú]{3\,50}\b)\s*){2\,}$/',
        'email' => 'required|email',
        'password' => 'required',
        'plaintextPassword' => 'required|regex:/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8\,64})/',
        'permissions' => 'optional',
        'status' => 'optional'
    ];

    public function getUsers(?string $name = null, ?int $page = null, ?int $perPage = null): array
    {
        $result = $this->getDatabaseToRead()->select()->from($this->getTable());

        if (!empty($name)) {
            $result->whereLike('name', '%' . $name . '%');
        }

        $users = $result->limit(...$this->makePageLimitAndOffset($page ?? 1, $perPage ?? 10))->run()->fetchArrayAll();

        foreach ($users as &$user) {
            $user = $this->makeEntity($user);
        }

        unset($user);

        $this->setPager(new Pager($page ?? 1, $perPage ?? 10, $this->count()));

        return $users;
    }

    public function getUserByCPF(string $cpf): ?object
    {
        $result = $this->getDatabaseToRead()->select()
            ->from($this->getTable())
            ->whereEqual('cpf', $cpf)->run();

        return $result->fetch();
    }

    public function getUserByEmail(string $email): ?object
    {
        $result = $this->getDatabaseToRead()->select()
            ->from($this->getTable())
            ->whereEqual('email', $email)->run();

        return $result->fetch();
    }

    protected function getValidationLabels(): array
    {
        return $this->validationLabels ??= [
            'name' => $this->getLanguage()->render('base', 'name'),
            'cpf' => $this->getLanguage()->render('base', 'cpf'),
            'email' => $this->getLanguage()->render('base', 'email'),
            'password' => $this->getLanguage()->render('base', 'password'),
            'permissions' => $this->getLanguage()->render('base', 'permissions'),
            'status' => $this->getLanguage()->render('base', 'status')
        ];
    }
}
