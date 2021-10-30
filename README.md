# Jql Builder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devmoath/jql-builder.svg?color=blue&style=for-the-badge)](https://packagist.org/packages/devmoath/jql-builder)
[![GitHub Workflow Status](https://img.shields.io/github/workflow/status/devmoath/jql-builder/Tests?color=blue&label=Test&style=for-the-badge)](https://github.com/DevMoath/jql-builder/actions/workflows/tests.yml)
[![Packagist Downloads](https://img.shields.io/packagist/dt/devmoath/jql-builder?color=blue&style=for-the-badge)](https://packagist.org/packages/devmoath/jql-builder)

Simple JQL builder for Jira search

## Installation

```bash
composer require devmoath/jql-builder
```

## Usage

Generate query with one condition:

```php
\DevMoath\JqlBuilder\Jql::query()
    ->whereProject('MY PROJECT')
    ->getQuery(); // "project = 'MY PROJECT'"
```

Generate query with many conditions:

```php
\DevMoath\JqlBuilder\Jql::query()
    ->whereProject('MY PROJECT')
    ->whereIssueType('support')
    ->whereStatus(['wip', 'created'], Jql::IN)
    ->getQuery(); // "project = 'MY PROJECT' and issuetype = 'support' and status in ('wip', 'created')"
```

Generate query with many conditions and order by:

```php
\DevMoath\JqlBuilder\Jql::query()
    ->whereProject('MY PROJECT')
    ->whereIssueType('support')
    ->whereStatus(['wip', 'created'], Jql::IN)
    ->orderBy('created', Jql::ASC)
    ->getQuery(); // "project = 'MY PROJECT' and issuetype = 'support' and status in ('wip', 'created') order by created asc"
```

generate query with custom filed conditions:

```php
\DevMoath\JqlBuilder\Jql::query()
    ->where('customfild_111', \DevMoath\JqlBuilder\Jql::EQUAL, 'value')
    ->where('customfild_222', \DevMoath\JqlBuilder\Jql::EQUAL, 'value')
    ->getQuery(); // "customfild_111 = 'value' and customfild_222 = 'value'"
```

generate query conditions based on your condition:

```php
\DevMoath\JqlBuilder\Jql::query()
    ->when('MY PROJECT', fn (\DevMoath\JqlBuilder\Jql $builder, $value) => $builder->whereProject($value))
    ->when(fn(\DevMoath\JqlBuilder\Jql $builder) => false, fn(\DevMoath\JqlBuilder\Jql $builder, $value) => $builder->whereIssueType($value))
    ->getQuery(); // "project = 'MY PROJECT'"
```

Also, you can add macro functions as well:

```php
$builder = new \DevMoath\JqlBuilder\Jql;

$builder::macro('whereCustom', function ($value) {
    /** @var Jql $this */
    return $this->where('custom', \DevMoath\JqlBuilder\Jql::EQUAL, $value);
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
