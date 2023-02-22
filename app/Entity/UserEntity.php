<?php

namespace App\Entity;

use Framework\Crypto\Password;
use Framework\Date\Date;
use Framework\MVC\Entity;
use SodiumException;

class UserEntity extends Entity
{
    protected int $id;
    protected string $cpf;
    protected string $name;
    protected string $email;
    protected string $password;
    protected string $plaintextPassword;
    protected string $permissions;
    protected int $status = 0;
    protected Date $createdAt;
    protected Date $updatedAt;

    /**
     * @throws SodiumException
     */
    protected function init(): void
    {
        if (isset($this->plaintextPassword)) {
            $this->password = Password::hash($this->plaintextPassword);
        }
    }
}
