<?php

namespace Tent\LibContainer;

use Psr\Container\ContainerInterface;
use Tent\LibContainer\Exception\NotFound;

class Container implements ContainerInterface
{

    protected $registered = [];

    public function get($id)
    {
        if ($this->has($id)) {
            return $this->registered[$id];
        }

        throw new NotFound;
    }

    public function has($id)
    {
        return isset($this->registered[$id]);
    }

    public function register($id, $val)
    {
        $this->registered[$id] = $val;
    }

}
