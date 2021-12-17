<?php

declare(strict_types=1);

namespace DevMoath\JqlBuilder;

use InvalidArgumentException;
use Spatie\Macroable\Macroable;
use Stringable;

final class Jql implements Stringable
{
    use Macroable;

    public const EQUALS = '=';

    public const NOT_EQUALS = '!=';

    public const GREATER_THAN = '>';

    public const GREATER_THAN_EQUALS = '>=';

    public const LESS_THAN = '<';

    public const LESS_THAN_EQUALS = '<=';

    public const IN = 'in';

    public const NOT_IN = 'not in';

    public const CONTAINS = '~';

    public const DOES_NOT_CONTAIN = '!~';

    public const IS = 'is';

    public const IS_NOT = 'is not';

    public const WAS = 'was';

    public const WAS_IN = 'was in';

    public const WAS_NOT_IN = 'was not in';

    public const WAS_NOT = 'was not';

    public const CHANGED = 'changed';

    public const AND = 'and';

    public const OR = 'or';

    public const NOT = 'not';

    public const EMPTY = 'empty';

    public const NULL = 'null';

    public const ORDER_BY = 'order by';

    public const DESC = 'desc';

    public const ASC = 'asc';

    private string $query = '';

    public static function query(): self
    {
        return new self();
    }

    public function where(string $column, string $operator, mixed $value, string $boolean = self::AND): self
    {
        $this->invalidBooleanOrOperator($boolean, $operator, $value);

        return tap($this, fn() => $this->appendQuery("$column $operator {$this->quote($operator, $value)}", $boolean));
    }

    public function orWhere(string $column, string $operator, mixed $value): self
    {
        return tap($this, fn() => $this->where($column, $operator, $value, self::OR));
    }

    public function whereProject(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->where('project', $operator, $value));
    }

    public function orWhereProject(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->orWhere('project', $operator, $value));
    }

    public function whereSummary(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->where('summary', $operator, $value));
    }

    public function orWhereSummary(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->orWhere('summary', $operator, $value));
    }

    public function whereType(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->where('type', $operator, $value));
    }

    public function orWhereType(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->orWhere('type', $operator, $value));
    }

    public function whereIssueType(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->where('issuetype', $operator, $value));
    }

    public function orWhereIssueType(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->orWhere('issuetype', $operator, $value));
    }

    public function whereStatus(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->where('status', $operator, $value));
    }

    public function orWhereStatus(mixed $value, string $operator = self::EQUALS): self
    {
        return tap($this, fn() => $this->orWhere('status', $operator, $value));
    }

    public function when(mixed $value, callable $callback): self
    {
        $value = value($value, $this);

        if ($value) {
            return $callback($this, $value) ?: $this;
        }

        return $this;
    }

    public function whenNot(mixed $value, callable $callback): self
    {
        $value = value($value, $this);

        if (! $value) {
            return $callback($this, $value) ?: $this;
        }

        return $this;
    }

    public function orderBy(string $column, string $direction): self
    {
        return tap($this, fn() => $this->appendQuery(self::ORDER_BY." $column $direction"));
    }

    public function rawQuery(string $query): self
    {
        return tap($this, fn() => $this->appendQuery($query));
    }

    public function getQuery(): string
    {
        return trim($this->query);
    }

    public function __toString(): string
    {
        return $this->getQuery();
    }

    private function quote(string $operator, mixed $value): string
    {
        if (in_array($operator, [self::IN, self::NOT_IN, self::WAS_IN, self::WAS_NOT_IN])) {
            return sprintf("('%s')", implode("', '", array_wrap($value)));
        }

        return "'$value'";
    }

    private function appendQuery(string $query, string $boolean = ''): void
    {
        if (empty($this->query)) {
            $this->query = $query;
        } else {
            $this->query .= " ".trim("$boolean $query");
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function invalidBooleanOrOperator(mixed $boolean, string $operator, mixed $value): void
    {
        if (! in_array($boolean, [self::AND, self::OR])) {
            throw new InvalidArgumentException(sprintf(
                'Illegal boolean [%s] value. only [%s, %s] is acceptable',
                $boolean,
                self::AND,
                self::OR
            ));
        }

        if (! in_array($operator, [self::IN, self::NOT_IN, self::WAS_IN, self::WAS_NOT_IN]) && is_array($value)) {
            throw new InvalidArgumentException(sprintf(
                'Illegal operator [%s] value. only [%s, %s, %s, %s] is acceptable when $value type is array',
                $operator,
                self::IN,
                self::NOT_IN,
                self::WAS_IN,
                self::WAS_NOT_IN,
            ));
        }
    }
}
