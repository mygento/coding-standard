<?php

namespace Mygento\CS\Stan;

use PHPStan\Reflection\ClassReflection;

class Store extends MethodReflections
{
    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        return $classReflection->getName() === 'Magento\Store\Api\Data\StoreInterface' && $methodName === 'getBaseUrl';
    }
}
