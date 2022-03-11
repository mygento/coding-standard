<?php

namespace Mygento\CS\Stan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\FunctionVariant;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\Php\DummyParameter;
use PHPStan\Type\ArrayType;
use PHPStan\Type\BooleanType;
use PHPStan\Type\Generic\TemplateTypeMap;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MixedType;
use PHPStan\Type\NullType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\UnionType;

abstract class MethodReflections implements \PHPStan\Reflection\MethodsClassReflectionExtension
{
    public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        $methodPrefix = substr($methodName, 0, 3);
        switch ($methodPrefix) {
            case 'get':
                return $this->returnGetMagicMethod($classReflection, $methodName);
            case 'set':
                return $this->returnSetMagicMethod($classReflection, $methodName);
            case 'uns':
                return $this->returnUnsetMagicMethod($classReflection, $methodName);
            case 'has':
                return $this->returnHasMagicMethod($classReflection, $methodName);
            default:
                throw new \PHPStan\ShouldNotHappenException();
        }
    }

    private function returnMethod($methodName, $classReflection, $params, $returnType)
    {
        $variants = new FunctionVariant(
            TemplateTypeMap::createEmpty(),
            null,
            $params,
            false,
            $returnType
        );

        return new MagicMethod($methodName, $classReflection, [$variants]);
    }

    private function returnGetMagicMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        $params = [
            new DummyParameter(
                'key',
                new StringType(),
                true,
                null,
                false,
                null
            ),
            new DummyParameter(
                'index',
                new UnionType([new StringType(), new IntegerType(), new NullType()]),
                true,
                null,
                false,
                null
            ),
        ];

        return $this->returnMethod($methodName, $classReflection, $params, new MixedType());
    }

    private function returnSetMagicMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        $params = [
            new DummyParameter(
                'key',
                new UnionType([new StringType(), new ArrayType(new MixedType(), new MixedType())]),
                true,
                null,
                false,
                null
            ),
            new DummyParameter(
                'value',
                new MixedType(),
                true,
                null,
                false,
                null
            ),
        ];

        return $this->returnMethod($methodName, $classReflection, $params, new ObjectType($classReflection->getName()));
    }

    private function returnUnsetMagicMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        $params = [
            new DummyParameter(
                'key',
                new UnionType([new NullType(), new StringType(), new ArrayType(new MixedType(), new MixedType())]),
                true,
                null,
                false,
                null
            ),
        ];

        return $this->returnMethod($methodName, $classReflection, $params, new ObjectType($classReflection->getName()));
    }

    private function returnHasMagicMethod(ClassReflection $classReflection, string $methodName): MethodReflection
    {
        $params = [
            new DummyParameter(
                'key',
                new StringType(),
                true,
                null,
                false,
                null
            ),
        ];

        return $this->returnMethod($methodName, $classReflection, $params, new BooleanType());
    }
}
