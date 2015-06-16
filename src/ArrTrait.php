<?php namespace Eaybar\DollarDash;

/**
 * ArrTrait
 * @package Eaybar\DollarDash
 * @author  Erik Aybar
 */
trait ArrTrait
{

    /**
     * Creates an array of elements split into groups the length of size. If collection can’t be split evenly, the
     * final chunk will be the remaining elements.
     * @param     $array
     * @param int $size
     * @return array
     */
    public static function chunk($array, $size = 1)
    {
        return array_chunk($array, $size);
    }

    /**
     * Creates an array with all falsey values removed. The values false, null, 0, "", undefined, and NaN are falsey.
     * @param $array
     * @return array
     */
    public static function compact($array)
    {
        return array_values(
            array_filter($array)
        );
    }

    /**
     * Creates an array of unique array values not included in the other provided arrays using SameValueZero for
     * equality comparisons.
     * @param $array
     * @param $_exclude_array ...array n-number of arrays to exclude
     * @return array
     */
    public static function difference($array, $_exclude_array)
    {
        return array_values(
            call_user_func_array('array_diff', func_get_args())
        );
    }

    /**
     * Creates a slice of array with n elements dropped from the beginning.
     * @param     $array
     * @param int $n
     * @return array
     */
    public static function drop($array, $n = 1)
    {
        return array_slice($array, $n);
    }

    /**
     * Creates a slice of array with n elements dropped from the end.
     * @param     $array
     * @param int $n
     * @return array
     */
    public static function dropRight($array, $n = 1)
    {
        $old_length = count($array);
        if ($n > $old_length) {
            return [];
        }

        return array_slice($array, 0, $old_length - $n);
    }

    /**
     * Creates a slice of array excluding elements dropped from the end.
     * Elements are dropped until predicate returns falsey.
     * The predicate is bound to thisArg and invoked with three arguments: (value, index, array).
     *
     * TODO: utilize _.matches, _.matchesProperty, and _.property callback shorthands
     *
     * @param $array
     * @param $predicate
     * @return array
     */
    public static function dropRightWhile($array, $predicate)
    {
        $i = count($array) - 1;
        for (; $i !== 0 ; $i--) {
            if ($predicate($array[$i], $i, $array)) {
                array_pop($array);
            } else {
                break;
            }
        }

        return $array;
    }

    /**
     * Creates a slice of array excluding elements dropped from the beginning.
     * Elements are dropped until predicate returns falsey.
     * The predicate is bound to thisArg and invoked with three arguments: (value, index, array).
     *
     * TODO: utilize _.matches, _.matchesProperty, and _.property callback shorthands
     *
     * @param $array
     * @param $predicate
     * @return array
     */
    public static function dropWhile($array, $predicate)
    {
        $original_length = count($array);
        $counter = 1;
        for (; $counter !== $original_length ; $counter++) {
            if ($predicate($array[0], 0, $array)) {
                array_shift($array);
            } else {
                break;
            }
        }

        return $array;
    }

    /**
     * This method is like _.find except that it returns the index of the first element predicate returns truthy for
     * instead of the element itself.
     * @param $array
     * @param $test
     * @return int|string
     */
    public static function findIndex($array, $test)
    {
        foreach ($array as $key => $value) {
            if ($test($value)) {
                return $key;
            }
        }

        return -1;
    }

    /**
     * Gets the first element of array.
     * @param $array
     * @return mixed
     */
    public static function first($array)
    {
        return array_shift($array);
    }

    /**
     * Removes all provided values from array using SameValueZero for equality comparisons.
     * Note: Unlike _.without, this method mutates array.
     * @param $array
     * @param $_values
     * @return array
     */
    public static function pull(&$array, $_values)
    {
        $values = array_slice(func_get_args(), 1);
        $array = array_values(
            array_diff($array, $values)
        );

        return $array;
    }

    /**
     * Creates an array excluding all provided values using SameValueZero for equality comparisons.
     * @param $array
     * @param $_values
     * @return array
     */
    public static function without($array, $_values)
    {
        $values = array_slice(func_get_args(), 1);
        return array_values(
            array_diff($array, $values)
        );
    }
}