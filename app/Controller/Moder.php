<?php

namespace Controller;


use Src\View;

class Moder
{

    public function moder(): string
    {
        return new View('site.moder');
    }

}
