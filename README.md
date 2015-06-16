# DollarDash

> A Treasure Chest of Functional/Utility Goodness and Normalized Sanity for PHP.

**Basically, [Lodash](https://lodash.com/) for PHP**

~~Very much~~ 100% inspired by the great work in Javascript-land over at: https://lodash.com/docs
_Currently_, **much of the documentation and test cases** are either very closely or **exactly** duplicated from the https://lodash.com/docs project.

~~Much~~ All real credit goes to the [lodash contributors](https://github.com/lodash/lodash/graphs/contributors)

#### Installation and Example Usages

Method Chaining
```php
use Eaybar\DollarDash\DollarDash as Dash;

Dash::chain([1, 2, 3, 1, 2, 3])
  ->without(2, 3)
  ->first();
// -> 1

Dash::chain([1, 2, 3, 1, 2, 3])
  ->without(2, 3)
  ->value();
// -> [1, 1]
```

Import the kitchen sink
```php
use Eaybar\DollarDash\DollarDash as Dash;

Dash::dropRightWhile([0, 1, 2, 3], function ($element, $index, $array) {
    return $element > 1;
});
// -> [0, 1]

Dash::compact([0, 1, false, 2, '', 3]);
// -> [1, 2, 3]
```

Import by module
```php
use Eaybar\DollarDash\Arr;

Arr::dropRightWhile([0, 1, 2, 3], function ($element, $index, $array) {
    return $element > 1;
});
// -> [0, 1]

Arr::compact([0, 1, false, 2, '', 3]);
// -> [1, 2, 3]
```

**W**ork **I**n **P**rogress. For example usage and to see it in action, head over the the `test/` directory and/or the [Lodash documentation](https://lodash.com/docs)

#### Current Features/Test Coverage see `test/`

ArrayFunctions
- [x] test array chunk
- [x] test array compact
- [x] test array difference
- [x] test array drop
- [x] test array dropRight
- [x] test array dropRightWhile
- [x] test array dropWhile
- [x] test array findIndex
- [x] test array first
- [x] test array pull
- [x] test array without

Chain
- [x] test chain instance
- [x] test chain array chainable method
- [x] test chain array chainable into value method

#### Thoughts? Comments?

Find me at [erikaybar.name](http://erikaybar.name/) or ping me at [@erikthedev_](https://twitter.com/erikthedev_)

#### To run the tests

```
# From the project root
composer install
vendor/bin/phpunit
```
