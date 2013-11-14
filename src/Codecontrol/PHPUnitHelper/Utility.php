<?php

namespace Codecontrol\PHPUnitHelper;

class Utility
{
    /**
     * @param mixed  $classOrObj
     * @param string $member
     * @param string $type
     *
     * @return mixed
     */
    public static function setClassMemberAsAccessible(
        $classOrObj,
        $member,
        $type
    ) {
        $class = is_object($classOrObj) ? get_class($classOrObj) : $classOrObj;
        $method = $type == 'method' ? 'getMethod' : 'getProperty';

        $member = (new \ReflectionClass($class))->{$method}($member);
        $member->setAccessible(true);

        return $member;
    }

    /**
     * @param mixed  $obj
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function callNonPublicMethodWithArguments(
        $obj,
        $method,
        array $arguments = array()
    ) {
        return self::setClassMemberAsAccessible($obj, $method, 'method')
            ->invokeArgs($obj, $arguments);
    }

    /**
     * @param mixed  $obj
     * @param string $property
     * @param mixed  $value
     *
     * @return mixed
     */
    public static function setNonPublicPropertyValue($obj, $property, $value)
    {
        self::setClassMemberAsAccessible($obj, $property, 'property')
            ->setValue($obj, $value);
    }

    /**
     * @param mixed  $obj
     * @param string $property
     *
     * @return mixed
     */
    public static function getNonPublicPropertyValue($obj, $property)
    {
        return self::setClassMemberAsAccessible($obj, $property, 'property')
            ->getValue($obj);
    }
}
