<?php

namespace Mygento\CS\Stan\Autoload;

interface AutoloaderInterface
{
    public function register(): void;
    public function auto(string $class): void;
}
