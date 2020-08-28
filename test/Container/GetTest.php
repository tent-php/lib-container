<?php

namespace Container;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use Tent\LibContainer\Container;
use Tent\LibContainer\Exception\NotFound;

class GetTest extends TestCase
{

    private function getReflector()
    {
        return new ReflectionMethod(Container::class, 'get');
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
        $this->assertTrue(count($params) === 1);
    }

    public function testParameterId()
    {
        $id = $this->getParameter(0);
        $this->assertTrue(is_null($id->getType()));
        $this->assertTrue($id->getName() === 'id');
    }

    public function testInvoke()
    {
        $container = new Container;
        try {
            $container->get('id');
        } catch (NotFound $e) {
            $this->assertTrue(true);
        }
        $container->register('id', 'val');
        $this->assertTrue($container->get('id') === 'val');
    }

    public function testReturn()
    {
        $return = $this->getReflector()->getReturnType();
        $this->assertTrue(is_null($return));
    }

}
