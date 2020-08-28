<?php

namespace Exception\NotFound;

use PHPUnit\Framework\TestCase;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionClass;
use Tent\LibContainer\Exception\NotFound;
use Throwable;

class ClassTest extends TestCase
{

    private function getReflector()
    {
        return new ReflectionClass(NotFound::class);
    }

    public function testInterface()
    {
        $this->assertTrue($this->getReflector()->implementsInterface(NotFoundExceptionInterface::class));
    }

    public function testThrowable()
    {
        $this->assertTrue($this->getReflector()->implementsInterface(Throwable::class));
    }

}
