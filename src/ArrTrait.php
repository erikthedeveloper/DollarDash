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
}