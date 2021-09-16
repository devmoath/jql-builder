<?php

declare(strict_types=1);

namespace DevMoath\JqlBuilder;

class Jql implements \Stringable
{
    public const EQUAL = '=';

    public const NOT_EQUAL = '!=';

    public const GREATER_THAN = '>';

    public const LESS_THAN = '<';

    public const GREATER_THAN_OR_EQUAL = '>=';

    public const LESS_THAN_OR_EQUAL = '<=';

    public const LIKE = '~';

    public const NOT_LIKE = '!~';

    public const IN = 'in';

    public const NOT_IN = 'not in';

    public const IS = 'is';

    public const IS_NOT = 'is not';

    public const AND = 'and';

    public const OR = 'or';

    public const WAS = 'was';

    public const WAS_NOT = 'was not';

    public const WAS_IN = 'was in';

    public const WAS_NOT_IN = 'was not in';

    public const CHANGED = 'changed';

    public const ORDER_BY = 'order by';

    public const DESC = 'desc';

    public const ASC = 'asc';

    public const EMPTY = 'empty';

    public const NULL = 'null';

    private string $query = '';

    public static function query(): self
    {
        return new self();
    }

    public function whereProject(string|int $value, string $operator = self::EQUAL): self
    {
        return tap($this, function () use ($value, $operator) {
            $this->appendQuery("project $operator '$value'");
        });
    }

    public function orWhereProject(string|int $value, string $operator = self::EQUAL): self
    {
        return tap($this, function () use ($value, $operator) {
            $this->appendQuery("project $operator '$value'", self::OR);
        });
    }

    public function whereType(string|int $value, string $operator = self::EQUAL): self
    {
        return tap($this, function () use ($value, $operator) {
            $this->appendQuery("type $operator '$value'");
        });
    }

    public function orWhereType(string|int $value, string $operator = self::EQUAL): self
    {
        return tap($this, function () use ($value, $operator) {
            $this->appendQuery("type $operator '$value'", self::OR);
        });
    }

    public function whereIssueType(string|int $value, string $operator = self::EQUAL): self
    {
        return tap($this, function () use ($value, $operator) {
            $this->appendQuery("issuetype $operator '$value'");
        });
    }

    public function orWhereIssueType(string|int $value, string $operator = self::EQUAL): self
    {
        return tap($this, function () use ($value, $operator) {
            $this->appendQuery("issuetype $operator '$value'", self::OR);
        });
    }

    public function whereCustom(string $name, string|int $value, string $operator = self::LIKE): self
    {
        return tap($this, function () use ($name, $operator, $value) {
            $this->appendQuery("'$name' $operator '$value'");
        });
    }

    public function orWhereCustom(string $name, string|int $value, string $operator = self::LIKE): self
    {
        return tap($this, function () use ($name, $operator, $value) {
            $this->appendQuery("'$name' $operator '$value'", self::OR);
        });
    }

    public function whereStatus(array|string $value, string $operator = self::IN): self
    {
        $values = implode("', '", is_array($value) ? $value : [$value]);

        return tap($this, function () use ($values, $operator) {
            $this->appendQuery("status $operator ('$values')");
        });
    }

    public function orWhereStatus(array|string $value, string $operator = self::IN): self
    {
        $values = implode("', '", is_array($value) ? $value : [$value]);

        return tap($this, function () use ($values, $operator) {
            $this->appendQuery("status $operator ('$values')", self::OR);
        });
    }

    public function when(mixed $value, callable $callback): self
    {
        if ($value) {
            return $callback($this, $value);
        }

        return $this;
    }

    public function whenNot(mixed $value, callable $callback): self
    {
        if (! $value) {
            return $callback($this, $value);
        }

        return $this;
    }

    public function getQuery(): string
    {
        return trim($this->query);
    }

    public function __toString(): string
    {
        return $this->getQuery();
    }

    private function appendQuery(string $expression, string $operator = self::AND)
    {
        if (empty($this->query)) {
            $this->query = $expression;
        } else {
            $this->query .= " $operator $expression";
        }
    }
}
