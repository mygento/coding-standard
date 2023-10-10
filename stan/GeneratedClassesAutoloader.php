<?php

namespace Mygento\CS\Stan;

use Magento\Framework\TestFramework\Unit\Autoloader\GeneratedClassesAutoloader as OriginGeneratedClassesAutoloader;
use Magento\Framework\TestFramework\Unit\Autoloader\GeneratorInterface;
use Magento\Framework\Code\Generator\Io;

class GeneratedClassesAutoloader extends OriginGeneratedClassesAutoloader
{
    /**
     * Load class
     *
     * @param string $className
     * @return bool
     */
    public function load($className)
    {
        //check if it already exists and is loaded then don't need to load again
        if (class_exists($className)) {
            return false;
        }
        
        return parent::load($className);
    }
}
