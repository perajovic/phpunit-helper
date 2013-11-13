<?php

namespace PHPUnitHelper;

use \PHPUnit_Framework_TestCase as PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @param string $class
     * @param array  $methods
     *
     * @return object
     */
    public function createMockFor($class, array $methods = array())
    {
        return $this
            ->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * @param object $obj
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function callNonPublicMethodWithArguments(
        $obj,
        $method,
        array $arguments = array()
    ) {
        return Utility::setClassMemberAsAccessible($obj, $method, 'method')
            ->invokeArgs($obj, $arguments);
    }
}
