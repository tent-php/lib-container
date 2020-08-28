<?php

namespace Container;

use PHPUnit\Framework\TestCase;
use ReflectionProperty;
use Tent\LibContainer\Container;

class RegisteredTest extends TestCase
{

    private function getReflector()
    {
        return new ReflectionProperty(Container::class, 'registered');
    }

    public function testVisibility()
    {
        $this->assertTrue($this->getReflector()->isProtected());
    }

    public function testInitialize()
    {
        $reflector = $this->getReflector();
        $reflector->setAccessible(true);
        $value = $reflector->getValue(new Container);
        $this->assertTrue($value === []);
    }

}
