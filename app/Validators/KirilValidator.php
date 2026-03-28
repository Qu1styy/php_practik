<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class KirilValidator extends AbstractValidator
{

    protected string $message = 'Поле :field не правильный формат';

    public function rule(): bool
    {
        if ($this->value === null || $this->value === '') {
            return true;
        }

        $name = trim((string)$this->value);

        return preg_match('/^[А-Яа-яЁё\s-]+$/', $name) === 1;
    }
}
