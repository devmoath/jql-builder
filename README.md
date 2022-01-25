![logo](art/logo.png)

# Jql Builder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devmoath/jql-builder.svg?style=for-the-badge)](https://packagist.org/packages/devmoath/jql-builder)
[![Packagist Downloads](https://img.shields.io/packagist/dt/devmoath/jql-builder?style=for-the-badge)](https://packagist.org/packages/devmoath/jql-builder)
[![Tests Workflow Status](https://img.shields.io/github/workflow/status/devmoath/jql-builder/tests?label=Tests&style=for-the-badge)](https://github.com/DevMoath/jql-builder/actions/workflows/tests.yml)
[![phpstan Workflow Status](https://img.shields.io/github/workflow/status/devmoath/jql-builder/phpstan?label=phpstan&style=for-the-badge)](https://github.com/DevMoath/jql-builder/actions/workflows/phpstan.yml)
[![php-cs-fixer Workflow Status](https://img.shields.io/github/workflow/status/devmoath/jql-builder/php-cs-fixer?label=php-cs-fixer&style=for-the-badge)](https://github.com/DevMoath/jql-builder/actions/workflows/php-cs-fixer.yml)

Simple JQL builder for Jira search

## Installation

```bash
composer require devmoath/jql-builder
```

## Usage

Generate query with one condition:

```php
use JqlBuilder\Jql;

Jql::query()
    ->whereProject('MY PROJECT')
    ->getQuery(); // "project = 'MY PROJECT'"

// Or just cast it to string
(string) Jql::query()
    ->whereProject('MY PROJECT'); // "project = 'MY PROJECT'"
```

Generate query with many conditions:

```php
use JqlBuilder\Jql;

Jql::query()
    ->whereProject('MY PROJECT')
    ->whereIssueType('support')
    ->whereStatus(['wip', 'created'], 'in')
    ->getQuery(); // "project = 'MY PROJECT' and issuetype = 'support' and status in ('wip', 'created')"
```

Generate query with many conditions and order by:

```php
use JqlBuilder\Jql;

Jql::query()
    ->whereProject('MY PROJECT')
    ->whereIssueType('support')
    ->whereStatus(['wip', 'created'], 'in')
    ->orderBy('created', 'asc')
    ->getQuery(); // "project = 'MY PROJECT' and issuetype = 'support' and status in ('wip', 'created') order by created asc"
```

generate query with custom filed conditions:

```php
use JqlBuilder\Jql;

Jql::query()
    ->where('customfild_111', '=', 'value')
    ->where('customfild_222', '=', 'value')
    ->getQuery(); // "customfild_111 = 'value' and customfild_222 = 'value'"
```

generate query conditions based on your condition:

```php
use JqlBuilder\Jql;

Jql::query()
    ->when('MY PROJECT', fn (Jql $builder, $value) => $builder->whereProject($value))
    // or you can use callback 
    ->when(fn (Jql $builder) => false, fn (Jql $builder, $value) => $builder->whereIssueType($value))
    ->getQuery(); // "project = 'MY PROJECT'"
```

generate query using raw query:

```php
use JqlBuilder\Jql;

Jql::query()
    ->rawQuery("project = 'MY PROJECT' order by created asc")
    ->getQuery(); // "project = 'MY PROJECT' order by created asc"
```

Also, you can add macro functions as well:

```php
use JqlBuilder\Jql;

$builder = new Jql;

$builder::macro('whereCustom', function ($value) {
    /** @var Jql $this */
    return $this->where('custom', '=', $value);
});

$builder->whereCustom('1')->getQuery(); // "custom = '1'"
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
