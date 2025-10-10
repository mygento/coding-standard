<?php

namespace Mygento\CS\Stan;

use Composer\Autoload\ClassLoader;

class ComposerClassLoader
{
    private ClassLoader $composer;

    public function __construct(string $magentoRoot)
    {
        $this->composer = new ClassLoader($magentoRoot . '/vendor');
        $autoloadFile = $magentoRoot . '/vendor/composer/autoload_namespaces.php';
        if (is_file($autoloadFile)) {
            /** @var array<string, string> $map */
            $map = require $autoloadFile;
            foreach ($map as $namespace => $path) {
                $this->composer->set($namespace, $path);
            }
        }

        $autoloadFile = $magentoRoot . '/vendor/composer/autoload_psr4.php';
        if (is_file($autoloadFile)) {
            /** @var array<string, string> $map */
            $map = require $autoloadFile;
            foreach ($map as $namespace => $path) {
                $this->composer->setPsr4($namespace, $path);
            }
        }

        $autoloadFile = $magentoRoot . '/vendor/composer/autoload_classmap.php';
        if (is_file($autoloadFile)) {
            /** @var ?array<string, string> $classMap */
            $classMap = require $autoloadFile;
            if (is_array($classMap)) {
                $this->composer->addClassMap($classMap);
            }
        }
    }

    public function isExists(string $classyConstructName): bool
    {
        return false !== $this->composer->findFile($classyConstructName);
    }

    public function findFile(string $class): ?string
    {
        $find = $this->composer->findFile($class);
        return false === $find ? null : $find;
    }
}
