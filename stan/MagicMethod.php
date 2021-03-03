<?php

namespace Mygento\CS\Stan;

use PHPStan\Reflection\ClassMemberReflection;
use PHPStan\Reflection\ClassReflection;

class MagicMethod implements \PHPStan\Reflection\MethodReflection
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ClassReflection
     */
    private $declaringClass;

    /**
     * @var array
     */
    private $variants;

    public function __construct(string $name, ClassReflection $declaringClass, array $variants = [])
    {
        $this->name = $name;
        $this->declaringClass = $declaringClass;
        $this->variants = $variants;
    }

    public function getDeclaringClass(): ClassReflection
    {
        return $this->declaringClass;
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function isPrivate(): bool
    {
        return false;
    }

    public function isPublic(): bool
    {
        return true;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrototype(): ClassMemberReflection
    {
        return $this;
    }

    public function getVariants(): array
    {
        return $this->variants;
    }

    public function getDocComment(): ?string
    {
        return null;
    }

    public function isDeprecated(): \PHPStan\TrinaryLogic
    {
        return \PHPStan\TrinaryLogic::createNo();
    }

    public function getDeprecatedDescription(): ?string
    {
        return '';
    }

    public function isFinal(): \PHPStan\TrinaryLogic
    {
        return \PHPStan\TrinaryLogic::createNo();
    }

    public function isInternal(): \PHPStan\TrinaryLogic
    {
        return \PHPStan\TrinaryLogic::createNo();
    }

    public function getThrowType(): ?\PHPStan\Type\Type
    {
        return null;
    }

    public function hasSideEffects(): \PHPStan\TrinaryLogic
    {
        if (in_array(substr($this->name, 0, 3), ['set', 'uns'])) {
            return \PHPStan\TrinaryLogic::createYes();
        }

        return \PHPStan\TrinaryLogic::createNo();
    }
}
