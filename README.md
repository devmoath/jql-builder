# Jql Builder

Simple JQL builder for Jira search

## Installation

```bash
composer require devmoath/jql-builder
```

## Usage

```php
use DevMoath\JqlBuilder\Jql;

$example = (string) Jql::query()->whereProject('MY PROJECT'); // => "project = 'MY PROJECT'"

$example = (string) Jql::query()->whereProject('MY PROJECT')->whereStatus(['wip', 'created']); // => "project = 'MY PROJECT' AND status in ('wip', 'created')"
```

## Testing

```bash
composer test
```
