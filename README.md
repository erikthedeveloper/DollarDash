# DollarDash

> A Treasure Chest of Functional/Utility Goodness and Normalized Sanity for PHP.

**Basically, [Lodash](https://lodash.com/) for PHP**

~~Very much~~ 100% inspired by the great work in Javascript-land over at: https://lodash.com/docs
_Currently_, **much of the documentation and test cases** are either very closely or **exactly** duplicated from the https://lodash.com/docs project.

~~Much~~ All real credit goes to the [lodash contributors](https://github.com/lodash/lodash/graphs/contributors)

#### Installation and Example Usages

Import the kitchen sink
```php
use Eaybar\DollarDash\DollarDash as _;

_::dropRightWhile([0, 1, 2, 3], function ($element, $index, $array) {
    return $element > 1;
});
// -> [0, 1]

_::compact([0, 1, false, 2, '', 3]);
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

#### Thoughts? Comments?

Find me at [erikaybar.name](http://erikaybar.name/) or ping me at [@erikthedev_](https://twitter.com/erikthedev_)

#### To run the tests

```
# From the project root
composer install
vendor/bin/phpunit
```