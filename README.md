# Jql Builder

Simple JQL builder for Jira search

## Installation

```bash
composer require devmoath/jql-builder
```

## Usage

```php
use DevMoath\JqlBuilder\Jql;

$example = (string) Jql::query()->whereProject('MY PROJECT');

echo $example; // "project = 'MY PROJECT'"

$example = (string) Jql::query()->whereProject('MY PROJECT')->whereStatus(['wip', 'created']);

echo $example; // "project = 'MY PROJECT' AND status in ('wip', 'created')"

$example = (string) Jql::query()->when('MY PROJECT', function (Jql $builder, $value) {
    return $builder->whereProject($value);
});

echo $example; // "project = 'MY PROJECT'"

$testcase2 = (string) Jql::query()->when('', function (Jql $builder, $value) {
    return $builder->whereProject($value);
});

echo $example; // ""

// more examples in the way.
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Moath](https://github.com/devmoath)
- [All Contributors](https://github.com/DevMoath/jql-builder/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
