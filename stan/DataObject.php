<?php

namespace Mygento\CS\Stan;

use PHPStan\Reflection\ClassReflection;

class DataObject extends MethodReflections
{
    public function hasMethod(ClassReflection $classReflection, string $methodName): bool
    {
        $parentClasses = $classReflection->getParentClassesNames();
        $parentClasses[] = $classReflection->getName();

        return in_array(\Magento\Framework\DataObject::class, $parentClasses, true) &&
            in_array(substr($methodName, 0, 3), ['get', 'set', 'uns', 'has']);
    }
}
