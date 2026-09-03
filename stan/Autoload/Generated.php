<?php

namespace Mygento\CS\Stan\Autoload;

use Magento\Framework\TestFramework\Unit\Autoloader\GeneratedClassesAutoloader;
use Magento\Framework\Code\Generator\Io;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\TestFramework\Unit\Autoloader\ExtensionAttributesGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\ExtensionAttributesInterfaceGenerator;
use Mygento\CS\Stan\ComposerClassLoader;

class Generated extends AbstractLoader
{
    private GeneratedClassesAutoloader $magentoLoader;
    private ComposerClassLoader $composer;

    public function __construct(private string $magentoRoot)
    {
        $this->magentoLoader = $this->loadMagentoGenerator();
        $this->composer = new ComposerClassLoader($this->magentoRoot);
    }

    public function auto(string $class): void
    {
        if (!$this->composer->isExists($class)) {
            $this->magentoLoader->load($class);
        }
    }

    private function loadMagentoGenerator()
    {
        $generatorIo = new Io(
            new File(),
            $this->magentoRoot. '/' .
            DirectoryList::getDefaultConfig()[DirectoryList::GENERATED_CODE][DirectoryList::PATH]
        );
        return new GeneratedClassesAutoloader(
            [
                new ExtensionAttributesGenerator(),
                new ExtensionAttributesInterfaceGenerator(),
                new FactoryGenerator(),
            ],
            $generatorIo
        );
    }
}
