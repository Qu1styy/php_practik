<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class KirilValidator extends AbstractValidator
{

    protected string $message = 'Поле :field только кирилица';

    public function rule(): bool
    {
        if ($this->value === null || $this->value === '') {
            return true;
        }

        $name = trim((string)$this->value);

        return preg_match('/^[А-Яа-яЁё -]+$/u', $name) === 1;
    }
}
