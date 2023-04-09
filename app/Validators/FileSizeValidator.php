<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class FileSizeValidator extends AbstractValidator
{

    protected string $message = 'Field :field файл слишком большой';

    public function rule(): bool
    {
        // var_dump($this->value['size']);die;
        return (bool)!($this->value['size'] > 20971520);
    }
}