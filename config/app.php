<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity'=>\Model\User::class,
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
        'moder' => \Middlewares\ModerMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'rowUnique' => \Validators\RowUniqueValidator::class,
        'birthData' => \Validators\BirthValidator::class,
        'languageRu' => \Validators\LanguageRuValidator::class,
        'fileSize' => \Validators\FileSizeValidator::class,
        'fileType' => \Validators\FileTypeValidator::class,
    ],
    'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],
    'aliases' => [
        'Image' => Intervention\Image\Facades\Image::class,
    ]

];
