<?php

namespace Container;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use Tent\LibContainer\Container;

class ClassTest extends TestCase
{

    private function getReflector()
    {
        return new ReflectionClass(Container::class);
    }

    public function testInterface()
    {
        $this->assertTrue($this->getReflector()->implementsInterface(ContainerInterface::class));
    }

}
