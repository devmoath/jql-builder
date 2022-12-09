<p align="center">
    <img src="art/example.png" alt="JQL Builder">
</p>

<p align="center">
    <a href="https://github.com/devmoath/jql-builder/actions"><img alt="GitHub Workflow Status (master)" src="https://img.shields.io/github/workflow/status/devmoath/jql-builder/Tests/master"></a>
    <a href="https://packagist.org/packages/devmoath/jql-builder"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/devmoath/jql-builder"></a>
    <a href="https://packagist.org/packages/devmoath/jql-builder"><img alt="Latest Version" src="https://img.shields.io/packagist/v/devmoath/jql-builder"></a>
    <a href="https://packagist.org/packages/devmoath/jql-builder"><img alt="License" src="https://img.shields.io/github/license/devmoath/jql-builder"></a>
</p>

---

**JQL builder** is a supercharged PHP package that allows you to
create [Jira Query Language (JQL)](https://www.atlassian.com/software/jira/guides/expand-jira/jql).

## Get Started

> **Requires [PHP 8.1+](https://php.net/releases/)**

First, install `devmoath/jql-builder` via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require devmoath/jql-builder
```

Then, interact with JQL builder:

```php
$query = new Jql();

$query->where('project', 'PROJECT')->where('summary', '~', 'title');

echo $query; // 'project = "PROJECT" and summary ~ "title"'
```

## Usage

### `where` function

```php
echo $query->where('project', '=', 'PROJECT')
    ->where('summary', '~', 'title');
```

<details>
<summary>query generated</summary>

```jql
project = "PROJECT" and summary ~ "title"
```

</details>

---

JQL builder is an open-sourced software licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.

