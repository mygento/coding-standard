<?php

use PHPStan\DependencyInjection\Container;
use Mygento\CS\Stan\AutoloaderInterface;

if (!isset($container) || !$container instanceof Container) {
    throw new \RuntimeException('You can not use autoload without phpstan extension');
}

foreach ($container->getServicesByTag('phpstan.mygento.autoloader') as $loader) {
    /** @var AutoloaderInterface $loader */
    $loader->register();
}
