<?php namespace Eaybar\DollarDash;

/**
 * Class CollectionTrait
 * @package Eaybar\DollarDash
 * @author  Erik Aybar
 */
trait CollectionTrait
{

    /**
     * Checks if predicate returns truthy for all elements of collection.
     * The predicate is bound to thisArg and invoked with three arguments: (value, index|key, collection).
     * @param array    $collection
     * @param callable $testFunc
     * @return bool
     */
    public static function every($collection, $testFunc)
    {
        // No need to iterate through entire collection. Short circuit upon first test "failure".
        foreach ($collection as $key => $value) {
            if (!$testFunc($value, $key, $collection)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks if predicate returns truthy for any element of collection.
     * The function returns as soon as it finds a passing value and does not iterate over the entire collection.
     * The predicate is invoked with three arguments: (value, index|key, collection).
     * @param array $collection
     * @param callable $testFunc
     * @return bool
     */
    public static function some($collection, $testFunc)
    {
        // No need to iterate through entire collection. Short circuit upon first test "success".
        foreach ($collection as $key => $value) {
            if ($testFunc($value, $key, $collection)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Iterates over elements of collection, returning an array of all elements predicate returns truthy for.
     * @param mixed|array $collection
     * @param callable    $predicate
     * @return array
     */
    public static function filter($collection, $predicate)
    {
        // TODO: Consider how to treat array vs. associative array vs. other iterables?
        return array_values(
            array_filter($collection, $predicate)
        );
    }

    /**
     * @see CollectionTrait::every
     * @param array    $collection
     * @param callable $testFunc
     * @return bool
     */
    public static function all()
    {
        return call_user_func_array([static::class, 'every'], func_get_args());
    }

    /**
     * @see CollectionTrait::some
     * @param array    $collection
     * @param callable $testFunc
     * @return bool
     */
    public static function any()
    {
        return call_user_func_array([static::class, 'some'], func_get_args());
    }
}