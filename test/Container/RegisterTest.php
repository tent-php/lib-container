<?php

namespace Container;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionProperty;
use Tent\LibContainer\Container;

class RegisterTest extends TestCase
{

    private function getReflector()
    {
        return new ReflectionMethod(Container::class, 'register');
    }

    private function getParameter($offset)
    {
        return $this->getReflector()->getParameters()[$offset];
    }

    public function testVisibility()
    {
        $this->assertTrue($this->getReflector()->isPublic());
    }

    public function testParameters()
    {
        $params = $this->getReflector()->getParameters();
        $this->assertTrue(count($params) === 2);
    }

    public function testParameterId()
    {
        $id = $this->getParameter(0);
        $this->assertTrue($id->getType()->getName() === 'string');
        $this->assertTrue($id->getName() === 'id');
    }

    public function testParameterVal()
    {
        $val = $this->getParameter(1);
        $this->assertTrue(is_null($val->getType()));
        $this->assertTrue($val->getName() === 'val');
    }

    public function testInvoke()
    {
        $registered = new ReflectionProperty(Container::class, 'registered');
        $registered->setAccessible(true);
        $container = new Container;
        $this->assertTrue($registered->getValue($container) === []);
        $container->register('id', 'val');
        $this->assertTrue($registered->getValue($container)['id'] === 'val');
    }

    public function testReturn()
    {
        $return = $this->getReflector()->getReturnType();
        $this->assertTrue(is_null($return));
    }

}
