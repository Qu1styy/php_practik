<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class MaxValidator extends AbstractValidator
{
    protected string $message = 'Поле :field превышает максимальную длину';

    public function rule(): bool
    {
        if ($this->value === null || $this->value === '') {
            return true;
        }

        $max = (int)($this->args[0] ?? 0);
        return mb_strlen((string)$this->value) <= $max;
    }
}
