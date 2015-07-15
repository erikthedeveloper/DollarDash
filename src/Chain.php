<?php namespace Eaybar\DollarDash;


/**
 * Class Chain
 * @package Eaybar\DollarDash
 * @author  Erik Aybar
 */
class Chain
{

    protected $value;

    static protected $non_chainable_methods = [
        "add", "attempt", "camelCase", "capitalize", "clone", "cloneDeep", "deburr", "endsWith", "escape", "escapeRegExp", "every", "find", "findIndex", "findKey", "findLast", "findLastIndex", "findLastKey", "findWhere", "first", "get", "gt", "gte", "has", "identity", "includes", "indexOf", "inRange", "isArguments", "isArray", "isBoolean", "isDate", "isElement", "isEmpty", "isEqual", "isError", "isFinite", "isFunction", "isMatch", "isNative", "isNaN", "isNull", "isNumber", "isObject", "isPlainObject", "isRegExp", "isString", "isUndefined", "isTypedArray", "join", "kebabCase", "last", "lastIndexOf", "lt", "lte", "max", "min", "noConflict", "noop", "now", "pad", "padLeft", "padRight", "parseInt", "pop", "random", "reduce", "reduceRight", "repeat", "result", "runInContext", "shift", "size", "snakeCase", "some", "sortedIndex", "sortedLastIndex", "startCase", "startsWith", "sum", "template", "trim", "trimLeft", "trimRight", "trunc", "unescape", "uniqueId", "value"
    ];

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function __call($method_name, $arguments)
    {
        if (!method_exists(DollarDash::class, $method_name)) {
            throw new \Exception("WTF no {$method_name} method...");
        }

        array_unshift($arguments, $this->value);
        $result = call_user_func_array([DollarDash::class, $method_name], $arguments);

        if (array_search($method_name, static::$non_chainable_methods)) {
            return $result;
        } else {
            $this->value = $result;
            return $this;
        }
    }


}