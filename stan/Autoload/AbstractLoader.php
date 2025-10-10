<?php

namespace Mygento\CS\Stan\Autoload;

abstract class AbstractLoader
{
    public function register()
    {
        spl_autoload_register([$this, 'auto']);
    }
}
