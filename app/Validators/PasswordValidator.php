<?php


namespace Validators;

use Src\Validator\AbstractValidator;

class PasswordValidator extends AbstractValidator
{

    protected string $message = 'Поле :field вводи без кириллицы';

    public function rule(): bool
    {
        if ($this->value === null || $this->value === '') {
            return true;
        }

        $pass = $this->value;

        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]+$/', $pass) === 1;
    }
}
