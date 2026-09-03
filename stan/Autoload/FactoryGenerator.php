<?php

namespace Mygento\CS\Stan\Autoload;

use Magento\Framework\TestFramework\Unit\Autoloader\GeneratorInterface;
use Magento\Framework\Code\Generator\ClassGenerator;

class FactoryGenerator implements GeneratorInterface
{
    /**
     * Generates a factory class if it follows "<SourceClass>Factory" convention
     *
     * @param string $className
     * @return bool|string
     */
    public function generate($className)
    {
        if (!$this->isFactory($className)) {
            return false;
        }
        $methods = [[
            'name' => 'create',
            'parameters' => [['name' => 'data', 'type' => 'array', 'defaultValue' => []]],
            'body' => '',
            'returnType' => rtrim(substr($className, 0, -strlen('Factory')), '\\'),
        ]];
        $classGenerator = new ClassGenerator();
        $classGenerator->setName($className)
            ->addMethods($methods);
        return $classGenerator->generate();
    }

    /**
     * Check if the class name is a factory by convention "<SourceClass>Factory"
     *
     * @param string $className
     * @return bool
     */
    private function isFactory($className)
    {
        if ($className === null || !preg_match('/[\\\A-Z]/', substr(ltrim($className), 0, 1))) {
            return false;
        }
        $sourceName = rtrim(substr($className, 0, -strlen('Factory')), '\\');
        return $sourceName . 'Factory' == $className;
    }
}
