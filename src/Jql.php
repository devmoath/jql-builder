<?php

declare(strict_types=1);

namespace DevMoath\JqlBuilder;

final class Jql implements \Stringable
{
    use \Spatie\Macroable\Macroable;

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

    public function where(string $column, string $operator, mixed $value, string $boolean = self::AND): self
    {
        $this->invalidBoolean($boolean);

        return tap($this, function () use ($column, $operator, $value, $boolean) {
            if (empty($this->query)) {
                $this->query = "$column $operator {$this->quote($operator, $value)}";
            } else {
                $this->query .= " $boolean $column $operator {$this->quote($operator, $value)}";
            }
        });
    }

    public function orWhere(string $column, string $operator, mixed $value): self
    {
        return tap($this, fn() => $this->where($column, $operator, $value, self::OR));
    }

    public function quote(string $operator, mixed $value): string
    {
        if (in_array($operator, [self::IN, self::NOT_IN, self::WAS_IN, self::WAS_NOT_IN])) {
            return sprintf("('%s')", implode("', '", array_wrap($value)));
        }

        return "'$value'";
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function invalidBoolean(mixed $boolean): void
    {
        if (! in_array($boolean, [self::AND, self::OR])) {
            throw new \InvalidArgumentException(sprintf(
                "Illegal boolean [%s] value. only [%s, %s] is acceptable",
                $boolean,
                self::AND,
                self::OR
            ));
        }
    }

    public function whereProject(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->where('project', $operator, $value));
    }

    public function orWhereProject(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->orWhere('project', $operator, $value));
    }

    public function whereType(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->where('type', $operator, $value));
    }

    public function orWhereType(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->orWhere('type', $operator, $value));
    }

    public function whereIssueType(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->where('issuetype', $operator, $value));
    }

    public function orWhereIssueType(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->orWhere('issuetype', $operator, $value));
    }

    public function whereStatus(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->where('status', $operator, $value));
    }

    public function orWhereStatus(mixed $value, string $operator = self::EQUAL): self
    {
        return tap($this, fn() => $this->orWhere('status', $operator, $value));
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
}
