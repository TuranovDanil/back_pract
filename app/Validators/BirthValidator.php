<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class BirthValidator extends AbstractValidator
{

    protected string $message = 'Field :field не может быть в будущем';

    public function rule(): bool
    {
        return (bool)!($this->value > date('Y-m-d'));
    }
}