<?php namespace Eaybar\DollarDash;

/**
 * Class DollarDash - The Kitchen Sink!
 * @package Eaybar\DollarDash
 * @author  Erik Aybar
 */
class DollarDash
{

    use ArrTrait;
    use ObjectTrait;
    use CollectionTrait;

    public static function chain($value)
    {
        return new Chain($value);
    }
}