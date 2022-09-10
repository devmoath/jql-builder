![logo](art/logo.png)

# Jql Builder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devmoath/jql-builder.svg?style=for-the-badge)](https://packagist.org/packages/devmoath/jql-builder)
[![Packagist Downloads](https://img.shields.io/packagist/dt/devmoath/jql-builder?style=for-the-badge)](https://packagist.org/packages/devmoath/jql-builder)

Simple JQL builder for Jira search

## Installation

```bash
composer require devmoath/jql-builder
```

## Usage

This is how to generate query:

```php
use JqlBuilder\Jql;

$builder = new Jql();

// Simple query
$query = $builder->where('project', 'MY PROJECT')->getQuery();

echo $query;
// 'project = "MY PROJECT"'

$builder = new Jql();

// Complex query
$query = $builder->where('project', 'MY PROJECT')
    ->where('status', ['New', 'Done'])
    ->orWhere('summary', '~', 'sub-issue for "TES-xxx"')
    ->orWhere('labels', 'support')
    ->when(false, fn (Jql $builder, mixed $value) => $builder->where('creator', 'admin'))
    ->when(true, fn (Jql $builder, mixed $value) => $builder->where('creator', 'guest'))
    ->orderBy('created', 'asc')
    ->getQuery();

echo $query;
// 'project = "MY PROJECT" and status in ("New", "Done") or summary ~ "sub-issue for \"TES-xxx\"" or labels = "support" and creator = "guest" order by created asc'
```

Also, you can add macro functions as well to encapsulate your logic:

```php
use JqlBuilder\Jql;

$builder = new Jql();

$builder::macro('whereCustom', function (mixed $value) {
    /*
     * your code...
     */
    
    /** @var Jql $this */
    return $this->where('custom', $value);
});

$query = $builder->whereCustom('1')->getQuery();

echo $query;
// 'custom = "1"'
```

laravel facade support out of the box:

```php
use JqlBuilder\Facades\Jql;

$query = Jql::where('summary', '=', 'value')->getQuery();

echo $query;
// 'summary = "value"'
```

## Testing

```bash
composer test
```
