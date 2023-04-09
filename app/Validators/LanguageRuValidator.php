<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LanguageRuValidator extends AbstractValidator
{
    protected string $message = 'Field :field должно содержать только кириллицу';

    public function rule(): bool
    {
        return preg_match('/[а-яёА-ЯЁ]+/u',$this->value);
    }
}