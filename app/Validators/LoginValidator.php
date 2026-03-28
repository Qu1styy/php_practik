<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LoginValidator extends AbstractValidator
{

    protected string $message = 'Поле :field вводи без кириллицы, спецсимволов';

    public function rule(): bool
    {
        if ($this->value === null || $this->value === '') {
            return true;
        }

        $login = trim((string)$this->value);

        return preg_match('/^[a-zA-Z0-9]+$/', $login) === 1;
    }
}
