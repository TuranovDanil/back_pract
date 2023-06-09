<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class RowUniqueValidator extends AbstractValidator
{

    protected string $message = 'Field :field must be unique';

    public function rule(): bool
    {
        return (bool)!Capsule::table($this->args[0])
            ->where($this->args[1], $this->value)
            ->orWhere($this->args[2], $this->value)
            ->count();
    }
}
