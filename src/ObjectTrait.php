<?php namespace Eaybar\DollarDash;

/**
 * ObjectTrait
 * @package Eaybar\DollarDash
 * @author  Erik Aybar
 */
trait ObjectTrait
{

    /**
     * Assigns own enumerable properties of source object(s) to the destination object. Subsequent sources overwrite
     * property assignments of previous sources.
     *
     * TODO: Handle "objects" such as class instances, etc...?
     *
     * @param $target
     * @param $_source
     * @return mixed
     */
    public static function assign($target, $_source)
    {
        return call_user_func_array('array_merge', func_get_args());
    }

}